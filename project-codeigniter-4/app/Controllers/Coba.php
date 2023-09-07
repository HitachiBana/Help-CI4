<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "Ini Controller Coba Method Index";
    }

    public function about($nama = '', $umur = '',)
    {
        echo "Halo, Nama Saya $nama. Umur saya $umur";
    }
}
