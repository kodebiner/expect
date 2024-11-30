<?php

namespace App\Controllers;
use App\Models\BlogModel;

class Blog extends BaseController
{
    public function index()
    {
        // Calling Models

        // Populating Data

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Update & Inspirasi Expect';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';

        // Rendering View
        return view('blog/home', $data);
    }

    public function dummyarticle()
    {
        // Calling Models

        // Populating Data

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'LoremIpsum Dolor Sit Amet';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';

        // Rendering View
        return view('blog/dummy', $data);
    }
    
    public function indexoffice()
    {
        // Calling Models
        $BlogModel  = new BlogModel();

        // Populating Data
        $user       = auth()->user();
        $blogs      = $BlogModel->orderBy('id', 'DESC')->paginate(20, 'blogs');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Artikel';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['blogs']          = $blogs;
        $data['pager']          = $BlogModel->pager;

        // Rendering View
        return view('office/blog', $data);
    }

    public function new()
    {
        // Calling Models
        $BlogModel  = new BlogModel();

        // Populating Data
        $input      = $this->request->getPost();

        // Validation Rules
        $rules = [
            'title'     => 'required|alpha_numeric_punct|is_unique[blog.title]',
            'images'    => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Processing data
        if (isset($input['featured'])) {
            $featured = 1;
        } else {
            $featured = 0;
        }
        
        if (isset($input['highlight'])) {
            $highlight = 1;
        } else {
            $highlight = 0;
        }
        
        $insert = [
            'title'         => $input['title'],
            'images'        => $input['images'],
            'description'   => $input['description'],
            'content'       => $input['content'],
            'featured'      => $featured,
            'highlight'     => $highlight
        ];
        $BlogModel->insert($insert);

        return redirect()->back()->with('Message', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Calling Models
        $BlogModel = new BlogModel();

        // Populating Data
        $input  = $this->request->getPost();
        $blog   = $BlogModel->find($id);

        // Validation Rules
        $rules = [
            'title'  => 'required|alpha_numeric_punct|is_unique[blog.title]',
            'logo'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processing Data
        if (isset($input['featured'])) {
            $featured = 1;
        } else {
            $featured = 0;
        }
        
        if (isset($input['highlight'])) {
            $highlight = 1;
        } else {
            $highlight = 0;
        }

        if ($blog['images'] != $input['images']) {
            unlink('images/blog/'.$blog['images']);
        }

        $update = [
            'title'         => $input['title'],
            'images'        => $input['images'],
            'description'   => $input['description'],
            'content'       => $input['content'],
            'featured'      => $featured,
            'highlight'     => $highlight
        ];

        $BlogModel->update($id, $update);

        return redirect()->back()->with('message', 'Client berhasil diperbarui.');
    }

    public function delete()
    {
        // Calling Models
        $BlogModel  = new BlogModel();

        // Populating Data
        $input      = $this->request->getPost();
        
        // Validation Rules
        $rules = [
            'blog-id'  => 'required'
        ];

        // Validating
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processing Data
        $BlogModel->delete($input['blog-id']);
        $BlogModel->purgeDeleted();

        return redirect()->back()->with('error', 'Artikell berhasil dihapus.');
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
            $input->move(FCPATH . '/images/blog/', $filename);

            // Returning Message
            die(json_encode($filename));
        }
    }
}