<?php
namespace App\Controllers;

use App\Models\ContactModel; // Pastikan ini ada dan benar
use CodeIgniter\Controller;

class Contacts extends Controller // Pastikan nama kelas ini "Contacts"
{
    public function index() // Pastikan method ini ada dan public
    {
        $contactModel = new ContactModel(); // Memuat instansi ContactModel
        $data['contacts'] = $contactModel->findAll(); // Mengambil semua data kontak

        return view('contacts_view', $data); // Memuat view contacts_view
    }

    public function submit() // Method ini untuk /contact (GET) dan contacts/submit (POST)
    {
        $contactModel = new ContactModel();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email|is_unique[contacts.email]',
                'message' => 'required',
            ];

            if ($this->validate($rules)) {
                $contactModel->save([
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'message' => $this->request->getPost('message'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return redirect()->to('/contacts')->with('success', 'Pesan berhasil dikirim!');
            } else {
                return view('contact_form', ['validation' => $this->validator]);
            }
        }
        return view('contact_form');
    }
}