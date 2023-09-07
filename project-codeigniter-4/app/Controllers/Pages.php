<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Null'
        ];
        return view('Pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('Pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'JL. Gemuruh No. 69',
                    'kota' => 'Bandung',

                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'JL. Kujang Sari No. 69',
                    'kota' => 'Bandung',
                ]
            ]
        ];
        return view('Pages/contact', $data);
    }
}