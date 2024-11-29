<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    public function index()
    {
        // Calling Models
        $UserModel  = auth()->getProvider();

        // Populating Data
        $activeUser = auth()->user();
        $users      = $UserModel->findAll();
        $userArray  = [];

        foreach ($users as $user) {
            $groups = implode(",", $user->getGroups());
            $arr = [
                'id'        => $user->id,
                'username'  => $user->username,
                'email'     => $user->email,
                'role'      => $groups
            ];
            $userArray[] = $arr;
        }

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Client';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $activeUser;
        $data['clients']        = $clients;
        $data['pager']          = $ClientModel->pager;
    }
}