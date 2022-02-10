<?php

namespace App\Controllers;
use App\Models\Usuario;

class Usuarios extends BaseController{
    public function crearUsuario(){
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('user/user_crear').view('menu/6-footer');
    }
    public function registrar(){
        $usuario= $this->request->getPost('usuario');
        $rol= $this->request->getPost('rol');
        $contrasena= $this->request->getPost('contrasena');
		$nombres= $this->request->getPost('nombres');
        $apellidos= $this->request->getPost('apellidos');
        $dni= $this->request->getPost('dni');
		$telefono= $this->request->getPost('telefono');
        $data=['usuario' => $usuario,
            'rol' => $rol,
            'contrasena'=> password_hash($contrasena,PASSWORD_BCRYPT),
			'nombres_log' => $nombres,
			'apellidos_log' => $apellidos,
			'dni_log' => $dni,
			'telefono_log' => $telefono,
		];
        $valor=new Usuario();
        $respuesta=$valor->registrarUsuario($data);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/usuarios'))->with('mensaje','1');
		} else {
			return redirect()->to(base_url('/menu/usuarios'))->with('mensaje','0');
		}
    }
    
    public function index()
	{
		$Crud = new Usuario();
		$datos = $Crud->listarNombres();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('user/user_lista', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$usuario= $this->request->getPost('usuario');
        $rol= $this->request->getPost('rol');
        $contrasena= $this->request->getPost('contrasena');
		$nombres= $this->request->getPost('nombres');
        $apellidos= $this->request->getPost('apellidos');
        $dni= $this->request->getPost('dni');
		$telefono= $this->request->getPost('telefono');
        $datos=['usuario' => $usuario,
            'rol' => $rol,
            'contrasena'=> password_hash($contrasena,PASSWORD_BCRYPT),
			'nombres_log' => $nombres,
			'apellidos_log' => $apellidos,
			'dni_log' => $dni,
			'telefono_log' => $telefono,
		];
		$idLogin = $usuario= $this->request->getPost('idLogin');;

		$Crud = new Usuario();

		$respuesta = $Crud->actualizar($datos, $idLogin);

		if ($respuesta) {
			return redirect()->to(base_url('/menu/usuarios'))->with('mensaje','2');
		} else {
			return redirect()->to(base_url('/menu/usuarios'))->with('mensaje','3');
		}
	}
    public function editar($idLogin) {
		$data = ["idLogin" => $idLogin];
		$Crud = new Usuario();
		$respuesta = $Crud->obtenerUsuario($data);

		$datos = ["datos" => $respuesta];
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('user/user_editar', $datos).view('menu/6-footer');
	}

	public function eliminar($idLogin){
		$Crud = new Usuario();
		$data = ["idLogin" => $idLogin];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/menu/usuarios')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/menu/usuarios')->with('mensaje','5');
		}
	}
}
