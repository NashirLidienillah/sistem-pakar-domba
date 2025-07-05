<?php
namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\AturanModel;
use App\Models\RiwayatDiagnosaModel;
use App\Models\RiwayatDetailModel;

class Diagnosa extends BaseController
{
    protected $gejalaModel;
    protected $penyakitModel;
    protected $aturanModel;
    protected $riwayatDiagnosaModel;
    protected $riwayatDetailModel;

    public function __construct()
    {
        $this->gejalaModel = new GejalaModel();
        $this->penyakitModel = new PenyakitModel();
        $this->aturanModel = new AturanModel();
        $this->riwayatDiagnosaModel = new RiwayatDiagnosaModel();
        $this->riwayatDetailModel = new RiwayatDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Mulai Diagnosa Penyakit Domba',
            'gejala' => $this->gejalaModel->findAll()
        ];
        return view('diagnosa/index', $data);
    }

    public function process()
{
    $selectedGejala = array_filter($this->request->getPost('gejala'), function($val) {
        return $val > 0;
    });

    if (empty($selectedGejala)) {
        return redirect()->to('/diagnosa')->with('error', 'Silakan pilih tingkat keyakinan pada minimal satu gejala.');
    }

    $semuaPenyakit = $this->penyakitModel->findAll();
    $hasilDiagnosa = [];

    foreach ($semuaPenyakit as $penyakit) {
        $cf_combine = 0.0;
        $isFirstRule = true;
        $aturan = $this->aturanModel
            ->where('penyakit_id', $penyakit['id'])
            ->whereIn('gejala_id', array_keys($selectedGejala))
            ->findAll();

        foreach ($aturan as $rule) {
            $gejala_id = $rule['gejala_id'];
            $cf_pakar = $rule['cf_pakar'];
            $cf_user = $selectedGejala[$gejala_id];
            $cf_rule = $cf_user * $cf_pakar;
            if ($isFirstRule) {
                $cf_combine = $cf_rule;
                $isFirstRule = false;
            } else {
                $cf_combine = $cf_combine + $cf_rule * (1 - $cf_combine);
            }
        }

        if ($cf_combine > 0) {
            $hasilDiagnosa[] = ['penyakit_id' => $penyakit['id'], 'kode_penyakit' => $penyakit['kode_penyakit'], 'nama_penyakit' => $penyakit['nama_penyakit'], 'deskripsi' => $penyakit['deskripsi'], 'solusi' => $penyakit['solusi'], 'cf_hasil' => round($cf_combine * 100, 2)];
        }
    }

    $kesimpulanText = "Sistem tidak dapat menarik kesimpulan karena tidak ada penyakit yang cocok dengan gejala yang dipilih.";

    if (!empty($hasilDiagnosa)) {
        usort($hasilDiagnosa, function($a, $b) {
            return $b['cf_hasil'] <=> $a['cf_hasil'];
        });

        // KEMBALIKAN LOGIKA SIMPAN RIWAYAT KE VERSI AWAL
        $hasilTeratas = $hasilDiagnosa[0];
        $riwayatId = $this->riwayatDiagnosaModel->insert([
            'user_id'            => session()->get('user_id'),
            'hasil_penyakit_id'  => $hasilTeratas['penyakit_id'],
            'hasil_cf'           => $hasilTeratas['cf_hasil'] / 100,
        ], true);
        $riwayatId = $this->riwayatDiagnosaModel->getInsertID();


        foreach ($selectedGejala as $gejala_id => $cf_user) {
            $this->riwayatDetailModel->insert([
                'riwayat_id' => $riwayatId,
                'gejala_id'  => $gejala_id,
                'cf_user'    => $cf_user,
            ]);
        }

        $topPenyakit = $hasilDiagnosa[0];
        $kesimpulanText = "Berdasarkan analisis gejala, penyakit yang paling mungkin diderita oleh domba adalah **" . $topPenyakit['nama_penyakit'] . "** dengan tingkat keyakinan sebesar **" . $topPenyakit['cf_hasil'] . "%**. ";
        if (count($hasilDiagnosa) > 1) {
            $penyakitKedua = $hasilDiagnosa[1];
            if ($penyakitKedua['cf_hasil'] > 40) {
                $kesimpulanText .= " Selain itu, perlu diwaspadai juga adanya kemungkinan **" . $penyakitKedua['nama_penyakit'] . "** sebagai diagnosis banding dengan tingkat keyakinan " . $penyakitKedua['cf_hasil'] . "%.";
            }
        }
    }

    $data = ['title' => 'Hasil Diagnosa', 'hasil' => $hasilDiagnosa, 'kesimpulan_text' => $kesimpulanText];
    return view('diagnosa/hasil', $data);
}
}