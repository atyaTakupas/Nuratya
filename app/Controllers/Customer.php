<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Customer extends Controller
{
    public function index()
    {
        return view('customer/dashboard');
    }
}