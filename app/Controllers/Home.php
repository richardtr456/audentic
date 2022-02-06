<?php

namespace App\Controllers;
use App\Models\Usuario;

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
        $usuario=$this->request->getPost('usuario');
        $contrasena=$this->request->getPost('contrasena');
        $modelo_usuario=new Usuario();
        $data = $modelo_usuario->obtenerUsuario(['usuario'=>$usuario]);
        
        if(count($data)>0 && password_verify($contrasena,$data[0]['contrasena'])){
            $sesion=session();
            $sesion->set(['usuario'=>$data[0]['usuario'],'rol'=>$data[0]['rol']]);
            return redirect()->to(base_url('/menu'));
            // return view('menu/1-libreria').view('menu/2-header',$data).view('menu/3-sidenav').view('menu/4-sidebar').view('menu/5-content').view('menu/6-footer');
        }
        else{
            return redirect()->to(base_url('login'));
        }
        

        // var_dump($user);
    }

    public function menu(){
        return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('menu/5-content').view('menu/6-footer');
    }

    public function salir(){
        $sesion=session();
        $sesion->destroy();
        return redirect()->to(base_url('login'));
    }
    
}
