<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Calling Models

        // Populating Data

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'expect - Training Consultant';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';

        // Rendering View
        return view('home', $data);
    }

    public function profile()
    {
        // Calling Models

        // Populating Data

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'expect - Training Consultant';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';

        // Rendering View
        return view('home', $data);
    }
}
