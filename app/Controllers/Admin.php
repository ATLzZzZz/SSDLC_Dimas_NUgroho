<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        return view('admin_dashboard_view');
    }
}