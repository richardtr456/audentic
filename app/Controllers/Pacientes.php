<?php

namespace App\Controllers;
use App\Models\Paciente;

class Pacientes extends BaseController{
    public function registrar(){
		$nombres= $this->request->getPost('nombre');
        $apellidos= $this->request->getPost('apellido');
        $dni= $this->request->getPost('dni');
		$telefono= $this->request->getPost('telefono');
        $sexo= $this->request->getPost('sexo');
        $correo= $this->request->getPost('correo');
        $data=[
            'DNI' => $dni,
            'nombre_usu' => $nombres,
            'apellido_usu'=> $apellidos,
			'sexo' => $sexo,
			'telefono' => $telefono,
			'correo' => $correo,
		];
        $valor=new Paciente();
        $respuesta=$valor->registrarPaciente($data);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/pacientes'))->with('mensaje','1');
		} else {
			return redirect()->to(base_url('/menu/pacientes'))->with('mensaje','0');
		}
    }
    
    public function index()
	{
		$Crud = new Paciente();
		$datos = $Crud->listarPacientes();

		$mensaje = session('mensaje');

		$data = [
					"pacientes" => $datos,
					"mensaje" => $mensaje
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('pacientes/pacientes_lista', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$nombres= $this->request->getPost('nombre');
        $apellidos= $this->request->getPost('apellido');
        $dni= $this->request->getPost('dni');
		$telefono= $this->request->getPost('telefono');
        $sexo= $this->request->getPost('sexo');
        $correo= $this->request->getPost('correo');
        $datos=[
            'DNI' => $dni,
            'nombre_usu' => $nombres,
            'apellido_usu'=> $apellidos,
			'sexo' => $sexo,
			'telefono' => $telefono,
			'correo' => $correo,
		];
		$idLogin = $this->request->getPost('id');

		$Crud = new Paciente();

		$respuesta = $Crud->actualizar($datos, $idLogin);

		if ($respuesta) {
			return redirect()->to(base_url('/menu/pacientes'))->with('mensaje','2');
		} else {
			return redirect()->to(base_url('/menu/pacientes'))->with('mensaje','3');
		}
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
