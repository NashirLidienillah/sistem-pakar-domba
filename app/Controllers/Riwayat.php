<?php
namespace App\Controllers;

use App\Models\RiwayatDiagnosaModel;
use App\Models\RiwayatDetailModel;
use App\Models\UserModel;
use App\Models\PenyakitModel; 
use App\Models\AturanModel;
use App\Models\GejalaModel;

class Riwayat extends BaseController
{
    protected $riwayatDiagnosaModel;
    protected $riwayatDetailModel;
    protected $userModel;
    protected $penyakitModel; 
    protected $aturanModel;

    public function __construct()
    {
        $this->riwayatDiagnosaModel = new RiwayatDiagnosaModel();
        $this->riwayatDetailModel = new RiwayatDetailModel();
        $this->userModel = new UserModel();
        $this->penyakitModel = new PenyakitModel(); 
        $this->aturanModel = new AturanModel();
    }

    /**
     * Menampilkan daftar riwayat diagnosa milik user yang sedang login.
     */
    public function index()
    {
        $userId = session()->get('user_id');

        $riwayat = $this->riwayatDiagnosaModel
            ->select('riwayat_diagnosa.id, riwayat_diagnosa.tanggal_diagnosa, riwayat_diagnosa.hasil_cf, penyakit.nama_penyakit')
            ->join('penyakit', 'penyakit.id = riwayat_diagnosa.hasil_penyakit_id')
            ->where('riwayat_diagnosa.user_id', $userId)
            ->orderBy('riwayat_diagnosa.tanggal_diagnosa', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Riwayat Diagnosa Anda',
            'riwayat' => $riwayat
        ];

        return view('riwayat/index', $data);
    }

    /**
     * Menampilkan detail dari satu riwayat diagnosa.
     */
    public function detail($riwayatId)
{
    // 1. Ambil data utama & pastikan riwayat ini milik user yang sedang login
    $riwayatUtama = $this->riwayatDiagnosaModel
        ->where('id', $riwayatId)
        ->where('user_id', session()->get('user_id')) // Keamanan!
        ->first();
    
    if (!$riwayatUtama) {
        return redirect()->to('/riwayat')->with('error', 'Riwayat tidak ditemukan.');
    }

    // 2. Ambil gejala-gejala yang dipilih saat itu dari riwayat_detail
    $gejalaTerpilihDariRiwayat = $this->riwayatDetailModel->where('riwayat_id', $riwayatId)->findAll();
    $selectedGejala = array_column($gejalaTerpilihDariRiwayat, 'cf_user', 'gejala_id');
    
    // 3. Lakukan perhitungan ulang
    $semuaPenyakit = $this->penyakitModel->findAll();
    $hasilPerhitunganUlang = [];

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
            $hasilPerhitunganUlang[] = [
                'kode_penyakit' => $penyakit['kode_penyakit'],
                'nama_penyakit' => $penyakit['nama_penyakit'],
                'deskripsi' => $penyakit['deskripsi'],
                'solusi' => $penyakit['solusi'],
                'cf_hasil' => round($cf_combine * 100, 2)
            ];
        }
    }

    // 4. Urutkan hasil perhitungan ulang
    if (!empty($hasilPerhitunganUlang)) {
        usort($hasilPerhitunganUlang, function($a, $b) {
            return $b['cf_hasil'] <=> $a['cf_hasil'];
        });
    }

    $data = [
        'title' => 'Detail Riwayat Diagnosa',
        'riwayat' => $riwayatUtama,
        'hasil_diagnosa_lengkap' => $hasilPerhitunganUlang,
        'gejala_terpilih' => $gejalaTerpilihDariRiwayat,
    ];
    
    // Load model gejala untuk join nama
    $gejalaModel = new GejalaModel();
    foreach ($data['gejala_terpilih'] as &$gejala) {
        $infoGejala = $gejalaModel->find($gejala['gejala_id']);
        $gejala['nama_gejala'] = $infoGejala['nama_gejala'] ?? 'N/A';
    }

    return view('riwayat/detail', $data);
}

    /**
     * Menampilkan semua riwayat diagnosa untuk admin.
     */
    public function admin_index()
    {
        $riwayat = $this->riwayatDiagnosaModel
            ->select('riwayat_diagnosa.id, riwayat_diagnosa.tanggal_diagnosa, riwayat_diagnosa.hasil_cf, penyakit.nama_penyakit, users.nama_lengkap as nama_user')
            ->join('penyakit', 'penyakit.id = riwayat_diagnosa.hasil_penyakit_id')
            ->join('users', 'users.id = riwayat_diagnosa.user_id')
            ->orderBy('riwayat_diagnosa.tanggal_diagnosa', 'DESC')
            ->findAll();
            
        $data = [
            'title' => 'Riwayat Diagnosa Pengguna',
            'riwayat' => $riwayat
        ];

        return view('admin/riwayat/index', $data);
    }

    /**
     * Menampilkan detail satu riwayat untuk admin.
     */
    public function admin_detail($riwayatId)
    {
        // 1. Ambil data utama riwayat (siapa dan kapan)
        $riwayatUtama = $this->riwayatDiagnosaModel
            ->select('riwayat_diagnosa.*, users.nama_lengkap as nama_user')
            ->join('users', 'users.id = riwayat_diagnosa.user_id')
            ->where('riwayat_diagnosa.id', $riwayatId)
            ->first();

        if (!$riwayatUtama) {
            return redirect()->to('/admin/riwayat')->with('error', 'Riwayat tidak ditemukan.');
        }

        // 2. Ambil gejala-gejala yang dipilih saat itu dari riwayat_detail
        $gejalaTerpilihDariRiwayat = $this->riwayatDetailModel->where('riwayat_id', $riwayatId)->findAll();
        $selectedGejala = array_column($gejalaTerpilihDariRiwayat, 'cf_user', 'gejala_id');
        
        // 3. Lakukan perhitungan ulang persis seperti di DiagnosaController
        $semuaPenyakit = $this->penyakitModel->findAll();
        $hasilPerhitunganUlang = [];

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
                $hasilPerhitunganUlang[] = ['kode_penyakit' => $penyakit['kode_penyakit'], 'nama_penyakit' => $penyakit['nama_penyakit'], 'cf_hasil' => round($cf_combine * 100, 2)];
            }
        }

        // 4. Urutkan hasil perhitungan ulang
        if (!empty($hasilPerhitunganUlang)) {
            usort($hasilPerhitunganUlang, function($a, $b) {
                return $b['cf_hasil'] <=> $a['cf_hasil'];
            });
        }

        $data = [
            'title' => 'Detail Riwayat Diagnosa',
            'riwayat' => $riwayatUtama,
            'hasil_diagnosa_lengkap' => $hasilPerhitunganUlang, // Kirim hasil lengkap
            'gejala_terpilih' => $gejalaTerpilihDariRiwayat,
        ];
        
        // Load model gejala untuk join nama
        $gejalaModel = new GejalaModel();
        foreach ($data['gejala_terpilih'] as &$gejala) {
            $infoGejala = $gejalaModel->find($gejala['gejala_id']);
            $gejala['nama_gejala'] = $infoGejala['nama_gejala'] ?? 'N/A';
        }

        return view('admin/riwayat/detail', $data);
    }
}