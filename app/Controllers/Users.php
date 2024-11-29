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

        
    }
}