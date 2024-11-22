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
        $clients = $ClientModel->paginate(20);

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Client';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['clients']        = $clients;

        // Rendering View
        return view('office/client', $data);
    }

    public function editupload($id)
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