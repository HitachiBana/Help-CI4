<?php

namespace App\Controllers;

use App\Models\ComicsModel;

class Comics extends BaseController
{
    protected $comicsModel;

    public function __construct()
    {
        $this->comicsModel= new ComicsModel();
    }

    public function index()
    {
        // (Abaikan) Karena Sudah Dibuat Fungsinya Di ComicsModel.php
        // $comics = $this->comicsModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'comics' => $this->comicsModel->getComics()
        ];

        // Cara Connect db Tanpa Model
        // $db = \Config\Database::connect();
        // $comics = $db->query("SELECT * FROM comics");
        // foreach ($comics->getResultArray() as $row) {
        //     d($row);
        // }

        // Cara Manual App\Models\ComicsModel
        // $comicsModel = new \App\Models\ComicsModel();

        // Cara Simple Tapi Harus Menambahkannya di Setiap Method Baru
        // $comicsModel= new ComicsModel();

        
        return view('Comics/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Comics Detail',
            'comics' => $this->comicsModel->getComics($slug)
        ];

        // Jika Comic Tidak Ada Pada Table
        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic ' . $slug . ' Not Found.');
        }

        return view('Comics/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' =>  'Add New Comic Form',
            'validation' => \Config\Services::validation()
        ];

        return view('Comics/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'judul' => 'required|is_unique[comics.judul]'
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comicsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data Comic Succesfuly Been Added.');

        return redirect()->to('/comics');
    }

}