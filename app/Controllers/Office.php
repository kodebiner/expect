<?php

namespace App\Controllers;

class Office extends BaseController
{
    public function index()
    {
        // Calling Models

        // Populating Data
        $user = auth()->user();

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Dashboard';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;

        // Rendering View
        return view('office/dashboard', $data);
    }
}