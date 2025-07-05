<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\GejalaModel;

class Gejala extends BaseController
{
    protected $gejalaModel;

    public function __construct()
    {
        $this->gejalaModel = new GejalaModel();
    }

    // Menampilkan daftar gejala
    public function index()
    {
        $data = [
            'title' => 'Kelola Data Gejala',
            'gejala' => $this->gejalaModel->findAll()
        ];
        return view('admin/gejala/index', $data);
    }

    // Menampilkan form tambah gejala
    public function create()
    {
        $data = ['title' => 'Tambah Gejala Baru'];
        return view('admin/gejala/create', $data);
    }

    // Menyimpan data gejala baru
    public function store()
    {
        $this->gejalaModel->save([
            'kode_gejala' => $this->request->getPost('kode_gejala'),
            'nama_gejala' => $this->request->getPost('nama_gejala'),
        ]);
        return redirect()->to('/admin/gejala')->with('success', 'Data Gejala berhasil ditambahkan.');
    }

    // Menampilkan form edit gejala
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Gejala',
            'gejala' => $this->gejalaModel->find($id)
        ];
        return view('admin/gejala/edit', $data);
    }

    // Memperbarui data gejala
    public function update($id)
    {
        $this->gejalaModel->update($id, [
            'kode_gejala' => $this->request->getPost('kode_gejala'),
            'nama_gejala' => $this->request->getPost('nama_gejala'),
        ]);
        return redirect()->to('/admin/gejala')->with('success', 'Data Gejala berhasil diperbarui.');
    }

    // Menghapus data gejala
    public function delete($id)
    {
        $this->gejalaModel->delete($id);
        return redirect()->to('/admin/gejala')->with('success', 'Data Gejala berhasil dihapus.');
    }
}