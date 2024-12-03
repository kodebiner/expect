<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        // Calling Models
        $GalleryModel = new GalleryModel();

        // Populating Data
        $user = auth()->user();
        $galleries = $GalleryModel->orderBy('id', 'DESC')->paginate(20, 'galleries');

        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = 'Daftar Galeri';
        $data['description']    = 'Bawa ide aplikasi Anda menjadi kenyataan dengan Kodebiner! Kami membengun aplikasi sesuai dengan kebutuhan bisnis Anda.';
        $data['user']           = $user;
        $data['galleries']      = $galleries;
        $data['pager']          = $GalleryModel->pager;

        // Rendering View
        return view('office/gallery', $data);
    }

    public function upload()
    {
        // Calling Models
        $GalleryModel = new GalleryModel();

        // Populating Data
        $input = $this->request->getFile('upload');

        // Validation Rules
        $rules = [
            'upload'   => 'uploaded[upload]|is_image[upload]|max_size[upload,1000]',
        ];

        // Validating
        if (!$this->validate($rules)) {
            http_response_code(400);
            die(json_encode(array('message' => $this->validator->getErrors())));
        }

        // Processing Data
        if ($input->isValid() && !$input->hasMoved()) {
            $filename = $input->getRandomName();
            $input->move(FCPATH . '/images/gallery/', $filename);

            $GalleryModel->insert(['image' => $filename]);
            $id = $GalleryModel->getInsertID();

            $return = [
                'id'        => $id,
                'filename'  => $filename
            ];

            // Returning Message
            die(json_encode($return));
        }
    }

    public function delete()
    {
        // Calling Models
        $GalleryModel = new GalleryModel();

        // Populating Data
        $input = $this->request->getPost();
        $gallery = $GalleryModel->find($input['id']);

        // Processing Data
        if (!empty($gallery)) {
            unlink('images/gallery/'.$gallery['image']);
            $GalleryModel->delete($input['id'], true);

            return redirect()->back()->with('error', 'Foto berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}