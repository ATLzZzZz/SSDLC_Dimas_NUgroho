<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; // Mengimpor UserModel Anda

class Auth extends Controller
{
    /**
     * Menampilkan halaman login.
     * Ini adalah halaman default saat mengakses root URL atau /login.
     */
    public function index()
    {
        // Memuat helper form untuk fungsi-fungsi form_open, dll.
        helper(['form']);
        echo view('login'); // Menampilkan view form login
    }

    /**
     * Memproses data yang dikirim dari form login.
     */
    public function processLogin()
    {
        // Memuat helper form untuk validasi input
        helper(['form']);

        // Pastikan permintaan adalah POST
        if ($this->request->getMethod() === 'post') {
            // Aturan validasi untuk input login
            $rules = [
                'username' => 'required|min_length[3]|max_length[100]', //
                'password' => 'required|min_length[8]|max_length[255]', //
            ];

            // Melakukan validasi input
            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                // Mencari user berdasarkan username
                $user = $userModel->where('username', $username)->first(); //

                // Memeriksa apakah user ditemukan dan password cocok
                if ($user && password_verify($password, $user['password'])) {
                    // Login berhasil, atur data session
                    $session = session();
                    $session->set([
                        'user_id' => $user['id'], //
                        'username' => $user['username'], //
                        'role' => $user['role'], //
                        'isLoggedIn' => true,
                    ]);

                    // Redirect berdasarkan peran (role)
                    if ($user['role'] === 'admin') { //
                        return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang, Admin!');
                    } else { //
                        return redirect()->to('/dashboard')->with('success', 'Login berhasil!');
                    }
                } else {
                    // Login gagal: username atau password salah
                    return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
                }
            } else {
                // Validasi gagal, kembalikan ke form login dengan pesan error
                return view('login', ['validation' => $this->validator]);
            }
        }
        // Jika diakses tidak melalui POST, redirect kembali ke halaman login
        return redirect()->to('/login');
    }

    /**
     * Melakukan proses logout pengguna.
     */
    public function logout()
    {
        $session = session();
        $session->destroy(); // Hancurkan semua data session
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}