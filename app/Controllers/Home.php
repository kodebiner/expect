<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AgendaCategoryModel;
use App\Models\AgendaModel;

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
        $ClientModel = new ClientModel();

        // Populating Data
        $clients = $ClientModel->findAll();

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Profil Expect';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['clients']        = $clients;

        // Rendering View
        return view('profile', $data);
    }

    public function layanan()
    {
        // Calling Models
        $AgendaCategoryModel    = new AgendaCategoryModel();
        $AgendaModel            = new AgendaModel();

        // Populating Data
        $agendas = [];
        $categories = $AgendaCategoryModel->findAll();

        foreach ($categories as $category) {
            $agendaLists = $AgendaModel->where('cat_id', $category['id'])->find();
            $lists = [];
            foreach ($agendaLists as $list) {
                $lists[] = $list['name'];
            }
            $agendas[] = [
                'name'  => $category['name'],
                'list'  => $lists
            ];
        }

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Layanan Pelatihan Expect';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['agendas']        = $agendas;

        // Rendering View
        return view('layanan', $data);
    }
}
