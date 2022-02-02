<?php

namespace App\Controllers;
use App\Models\Modelo_Usuario;

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
    // https://localhost/audentic/home/login
    public function login(){
        return view('login');
    }

    // login->formulario->autenticar->modelo_USUARIO->welcome_message


    public function autenticar(){
        //var_dump($_POST);
        $modelo_usuario=new Modelo_Usuario();
        $user= $modelo_usuario->consultar();
        if(!isset($user)){
            echo 'esta vacio';
        }
        else{
            echo 'hay un dato';
        }
        var_dump($user);
        

        // var_dump($user);
        return view('welcome_message',$user);
    }
    
}
