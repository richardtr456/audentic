<?php

namespace App\Controllers;

class miControlador extends BaseController
{
    public function index()
    {
        return view('prueba');
    }
    public function ceo()
    {
        $dato["dato1"]='TE mando un dato';
        return view('prueba',$dato);
    }
}
