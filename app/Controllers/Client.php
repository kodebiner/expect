<?php

namespace App\Controllers;

use App\Models\ClientModel;

class Client extends BaseController
{
    public function index()
    {
        // Calling Models
        $ClientModel = new ClientModel();

        // Populating Data
        $user = auth()->user();
        $clients = $ClientModel->orderBy('id', 'ASC')->paginate(20, 'clients');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Client';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['clients']        = $clients;
        $data['pager']          = $ClientModel->pager;

        // Rendering View
        return view('office/client', $data);
    }

    public function new()
    {
        // Calling Models
        $ClientModel = new ClientModel();

        // Populating Data
        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name'  => 'required|alpha_numeric_space',
            'logo'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Processing data
        $insert = [
            'name'  => $input['name'],
            'image' => $input['logo']
        ];
        $ClientModel->insert($insert);

        return redirect()->back()->with('Message', 'Client berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Calling Models
        $ClientModel = new ClientModel();

        // Populating Data
        $input  = $this->request->getPost();
        $client = $ClientModel->find($id);

        // Validation Rules
        $rules = [
            'name'  => 'required|alpha_numeric_space',
            'logo'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processing Data
        if ($client['image'] != $input['logo']) {
            unlink('images/clients/'.$client['image']);
        }

        $update = [
            'name'  => $input['name'],
            'image' => $input['logo']
        ];

        $ClientModel->update($id, $update);

        return redirect()->back()->with('Message', 'Client berhasil diperbarui.');
    }

    public function upload()
    {
        $input      = $this->request->getFile('upload');

        // Validation Rules
        $rules = [
            'upload'   => 'uploaded[upload]|is_image[upload]|max_size[upload,500]',
        ];

        // Validating
        if (!$this->validate($rules)) {
            http_response_code(400);
            die(json_encode(array('message' => $this->validator->getErrors())));
        }

        if ($input->isValid() && !$input->hasMoved()) {
            $filename = $input->getRandomName();
            $input->move(FCPATH . '/images/clients/', $filename);

            // Returning Message
            die(json_encode($filename));
        }
    }
}