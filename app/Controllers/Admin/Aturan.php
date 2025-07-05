<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AturanModel;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;

class Aturan extends BaseController {
protected $aturanModel;
protected $penyakitModel;
protected $gejalaModel;

public function __construct() {
$this->aturanModel = new AturanModel();
$this->penyakitModel = new PenyakitModel();
$this->gejalaModel = new GejalaModel();
}

// buat nampilin daftar aturan 
public function index() {
$data = [
          'title' => 'Kelola Aturan (Basis Pengetahuan)',
          'aturan' => $this->aturanModel->getAturanWithDetails()
];
return view('admin/aturan/index', $data);
}

// buat nampilin form tambah aturan
public function create() {
$data = [
          'title' => 'Tambah Aturan Baru',
          'penyakit' => $this->penyakitModel->findAll(),
          'gejala' => $this->gejalaModel->findAll(),
];
          return view('admin/aturan/create', $data);
}

// buat nyimpen data aturan baru
public function store() {
// Validasi agar aturan nya ga double
          $isExist = $this->aturanModel->where([
          'penyakit_id' => $this->request->getPost('penyakit_id'),
          'gejala_id' => $this->request->getPost('gejala_id')
          ])->first();

          if ($isExist) {
          return redirect()->to('/admin/aturan/create')->withInput()->with('error', 'Aturan untuk penyakit dan gejala yang dipilih sudah ada.');
}

          $this->aturanModel->save([
          'penyakit_id' => $this->request->getPost('penyakit_id'),
          'gejala_id'  => $this->request->getPost('gejala_id'),
          'cf_pakar'   => $this->request->getPost('cf_pakar'),
]);
          return redirect()->to('/admin/aturan')->with('success', 'Data Aturan berhasil ditambahkan.');
}

// ngehapus data aturan
public function delete($id) {
          $this->aturanModel->delete($id);
          return redirect()->to('/admin/aturan')->with('success', 'Data Aturan berhasil dihapus.');
}
}