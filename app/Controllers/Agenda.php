<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\AgendaCategoryModel;

class Agenda extends BaseController
{
    public function indexcat()
    {
        // Calling Models
        $AgendaCategoryModel    = new AgendaCategoryModel();

        // Populating Data
        $user       = auth()->user();
        $categories = $AgendaCategoryModel->orderBy('name', 'ASC')->paginate(20, 'agenda');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Kategori Agenda';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['categories']     = $categories;
        $data['pager']          = $AgendaCategoryModel->pager;

        // Rendering View
        return view('office/agenda', $data);
    }

    public function createcat()
    {
        // Calling Models
        $AgendaCategoryModel    = new AgendaCategoryModel;

        // Populating data
        $input                  = $this->request->getPost();

        // Processing data
        foreach ($input['name'] as $nameValue) {
            // Validation Rules
            $rules = [
                'name.*'  => 'required|alpha_numeric_punct|is_unique[agenda_cat.name]',
            ];
    
            // Validating
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
    
            $data['name']   = $nameValue;

            // Inserting Category
            $AgendaCategoryModel->insert($data);
        }
        
        // Rendering View
        return redirect()->to('office/agenda')->with('message', 'Kategori Berhasil Ditambahkan!');
    }

    public function editcat($id)
    {
        // Calling Models
        $AgendaCategoryModel    = new AgendaCategoryModel();

        // Populating data
        $input          = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name-category'  => 'required|alpha_numeric_punct|is_unique[agenda_cat.name]',
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Processing data
        $data = [
            'id'            => $id,
            'name'          => $input['name-category'],
        ];

        // Updating Category
        $AgendaCategoryModel->save($data);

        // Rendering View
        return redirect()->back()->with('message', 'Kategori Berhasil Diubah!');
    }

    public function deletecat()
    {
        // Calling Models
        $AgendaCategoryModel    = new AgendaCategoryModel();
        $AgendaModel            = new AgendaModel();

        // // Removing Agenda Data
        // $AgendaModel->where('cat_id', $id)->delete();

        // // Removing Category Data
        // $AgendaCategoryModel->delete($id);
        
        // Validation Rules
        $rules = [
            'category-id'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processing Data
        $AgendaModel->where('cat_id', 'category-id')->delete();
        // $AgendaModel->purgeDeleted();

        $AgendaCategoryModel->delete($AgendaCategoryModel['category-id']);
        // $AgendaCategoryModel->purgeDeleted();

        // Rendering View
        return redirect()->to('office/agenda')->with('error', 'Kategori Berhasil Dihapus!');
    }

    public function indexeditcat($id)
    {
        // Calling Models
        $AgendaModel            = new AgendaModel();
        $AgendaCategoryModel    = new AgendaCategoryModel();

        // Populating Data
        $user       = auth()->user();
        $category   = $AgendaCategoryModel->find($id);
        $agendas    = $AgendaModel->where('cat_id', $id)->orderBy('name', 'ASC')->paginate(20, 'editagenda');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Agenda';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['category']       = $category;
        $data['agendas']        = $agendas;
        $data['pager']          = $AgendaModel->pager;

        // Rendering View
        return view('office/agenda-edit', $data);
    }

    public function createagenda()
    {
        // Calling Models
        $AgendaModel            = new AgendaModel;

        // Populating data
        $input                  = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name.*'  => 'required|alpha_numeric_punct|is_unique[agenda.name]',
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Processing data
        foreach ($input['name'] as $nameValue) {
            $data['name']   = $nameValue;
            $data['cat_id'] = $input['cat_id'];

            // Inserting Agenda
            $AgendaModel->insert($data);
        }
        
        // Rendering View
        return redirect()->back()->with('message', 'Agenda Berhasil Ditambahkan!');
    }

    public function editagenda($id)
    {
        // Calling Models
        $AgendaModel    = new AgendaModel();

        // Populating data
        $input          = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name'  => 'required|alpha_numeric_punct|is_unique[agenda.name]',
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Processing data
        $data = [
            'id'            => $id,
            'cat_id'        => $input['cat_id'],
            'name'          => $input['name'],
        ];

        // Updating Agenda
        $AgendaModel->save($data);

        // Rendering View
        return redirect()->back()->with('message', 'Agenda Berhasil Diubah!');
    }

    public function deleteagenda()
    {
        // Calling Models
        $AgendaModel            = new AgendaModel();

        // // Removing Agenda Data
        // $AgendaModel->delete($id);
        
        // Validation Rules
        $rules = [
            'agenda-id'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processing Data
        $AgendaModel->delete($AgendaModel['agenda-id']);
        // $AgendaModel->purgeDeleted();

        // Rendering View
        return redirect()->back()->with('error', 'Agenda Berhasil Dihapus!');
    }
}