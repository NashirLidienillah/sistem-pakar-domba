<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Pastikan UserModel di-import

class Auth extends BaseController
{
    /**
     * Instance dari session service.
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * Instance dari UserModel.
     * @var \App\Models\UserModel
     */
    protected $userModel;

    public function __construct()
    {
        // Muat helper yang dibutuhkan di seluruh controller ini
        helper(['form', 'url']);
        
        // Inisialisasi service dan model
        $this->session = session();
        $this->userModel = new UserModel();
    }

    /**
     * Menampilkan halaman login.
     */
    public function login()
    {
        // Jika sudah login, redirect ke dashboard yang sesuai
        if ($this->session->get('isLoggedIn')) {
            $role = $this->session->get('role');
            return redirect()->to($role === 'admin' ? 'admin/dashboard' : 'user/dashboard');
        }

        return view('auth/login');
    }

    /**
     * Memproses upaya login dari user.
     */
    public function processLogin()
    {
        // Aturan validasi
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]',
        ];

        // Jalankan validasi
        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembali ke login dengan error
            return redirect()->to('login')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $this->userModel->where('username', $username)->first();

        // Cek apakah user ada dan password cocok
        if (!$user || !password_verify($password, $user['password'])) {
            // Jika tidak cocok, kirim pesan error
            $this->session->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('login');
        }

        // Jika berhasil, siapkan data session
        $sessionData = [
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
        ];
        $this->session->set($sessionData);

        // Redirect ke dashboard yang sesuai
        if ($user['role'] === 'admin') {
            return redirect()->to('admin/dashboard');
        }
        
        return redirect()->to('user/dashboard');
    }

    /**
     * Menampilkan halaman registrasi.
     */
    public function register()
    {
        return view('auth/register');
    }

    /**
     * Memproses pendaftaran user baru.
     */
    public function processRegister()
    {
        // Aturan validasi untuk registrasi
        $rules = [
            'nama_lengkap' => 'required|min_length[3]',
            'username'     => 'required|min_length[3]|is_unique[users.username]',
            'password'     => 'required|min_length[6]',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembali ke halaman registrasi
            return redirect()->to('register')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil, simpan data user baru
        $this->userModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'user', // Otomatis sebagai 'user'
        ]);

        // Kirim pesan sukses dan redirect ke halaman login
        $this->session->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('login');
    }

    /**
     * Menghapus sesi dan melakukan logout.
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
}