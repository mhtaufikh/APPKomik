<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | WebPoik',
            'salam' => ['abah', 'uhuy']
        ];
        echo view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | WebPoik'
        ];

        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact | WebPoik',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'kp hrg 290',
                    'kota' => 'bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jl cipageran',
                    'kota' => 'cimahi'
                ]
            ]
        ];
        echo view('pages/contact', $data);
    }
}
