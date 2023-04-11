<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        // $komikModel = new \App\Models::KomikModel();

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        //jika komik tidka ada ditabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik ' . $slug . 'tidak ditemukan');
        }
        return view('komik/detail', $data);
    }

    public function created()
    {
        $data = [
            'title' => 'Form tambah data komik'
        ];

        return view('komik/create', $data);
    }

    //insert database
    public function save()
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);   //merubah url ke string yg diingingkan
        $this->komikModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'sampul' => $this->request->getVar('sampul'),
                'keterangan' => $this->request->getVar('keterangan')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }
}


        // //cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM tb_komik");
        // foreach ($komik->getResultArray() as $row)
        //     d($row);