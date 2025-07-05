<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\AturanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $gejalaModel = new GejalaModel();
        $penyakitModel = new PenyakitModel();
        $aturanModel = new AturanModel();

        $data = [
            'title' => 'Dashboard',
            'jumlah_gejala' => $gejalaModel->countAllResults(),
            'jumlah_penyakit' => $penyakitModel->countAllResults(),
            'jumlah_aturan' => $aturanModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}