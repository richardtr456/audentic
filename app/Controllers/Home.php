<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Titulo de la pagina',
        ];

        echo view('home/header',$data);
        echo view('home/content');
        echo view('home/footer');
    }
    
}
