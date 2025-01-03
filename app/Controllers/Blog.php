<?php

namespace App\Controllers;
use App\Models\BlogModel;

class Blog extends BaseController
{
    public function index()
    {
        // Calling Models
        $BlogModel = new BlogModel();

        // Populating Data
        $highlights = $BlogModel->where('highlight', 1)->orderBy('created_at', 'DESC')->limit(2)->find();
        $blogs = $BlogModel->orderBy('created_at', 'DESC')->paginate(8, 'blogs');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Update & Inspirasi Expect';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['highlights']     = $highlights;
        $data['blogs']          = $blogs;        
        $data['pager']          = $BlogModel->pager;

        // Rendering View
        return view('blog/home', $data);
    }

    public function detail($slug)
    {
        // Calling Models
        $BlogModel = new BlogModel();

        // Populating Data
        $blog = $BlogModel->where('slug', $slug)->orderBy('created_at', 'DESC')->first();

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'LoremIpsum Dolor Sit Amet';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['blog']           = $blog;

        // Rendering View
        return view('blog/detail', $data);
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
        $blogs      = $BlogModel->orderBy('created_at', 'DESC')->paginate(20, 'blogs');

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
    
    public function indexadd()
    {
        // Populating Data
        $user       = auth()->user();

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Formulir Tambah Artikel';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;

        // Rendering View
        return view('office/blog-add', $data);
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

        $slug = preg_replace('/\s+/', '-', $input['title']);
        
        $insert = [
            'title'         => $input['title'],
            'slug'          => $slug,
            'images'        => $input['images'],
            'description'   => $input['description'],
            'content'       => $input['content'],
            'featured'      => $featured,
            'highlight'     => $highlight
        ];
        $BlogModel->insert($insert);

        return redirect()->to('office/blog')->with('message', 'Artikel berhasil ditambahkan');
    }
    
    public function indexedit($id)
    {
        // Calling Models
        $BlogModel  = new BlogModel();

        // Populating Data
        $user       = auth()->user();
        $blog       = $BlogModel->find($id);

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Formulir Perubahan Artikel';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['blog']           = $blog;

        // Rendering View
        return view('office/blog-edit', $data);
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
            'title'     => 'required|alpha_numeric_punct|is_unique[blog.title,blog.id,'.$id.']',
            'images'    => 'required'
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

        return redirect()->to('office/blog')->with('message', 'Artikel berhasil diperbarui.');
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

        return redirect()->back()->with('error', 'Artikel berhasil dihapus.');
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