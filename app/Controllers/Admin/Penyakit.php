<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PenyakitModel;

class Penyakit extends BaseController
{
    protected $penyakitModel;

    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Data Penyakit',
            'penyakit' => $this->penyakitModel->findAll()
        ];
        return view('admin/penyakit/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Penyakit Baru'];
        return view('admin/penyakit/create', $data);
    }

    public function store()
    {
        $this->penyakitModel->save([
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'solusi'        => $this->request->getPost('solusi'),
        ]);
        return redirect()->to('/admin/penyakit')->with('success', 'Data Penyakit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Penyakit',
            'penyakit' => $this->penyakitModel->find($id)
        ];
        return view('admin/penyakit/edit', $data);
    }

    public function update($id)
    {
        $this->penyakitModel->update($id, [
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'solusi'        => $this->request->getPost('solusi'),
        ]);
        return redirect()->to('/admin/penyakit')->with('success', 'Data Penyakit berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->penyakitModel->delete($id);
        return redirect()->to('/admin/penyakit')->with('success', 'Data Penyakit berhasil dihapus.');
    }
}