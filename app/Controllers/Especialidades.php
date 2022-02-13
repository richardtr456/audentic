<?php

namespace App\Controllers;
use App\Models\Especialidad;

class Especialidades extends BaseController{
    public function registrar(){
		$nombres= $this->request->getPost('nombres');
        $descripcion= $this->request->getPost('descripcion');
        $data=[
			'nombre_esp' => $nombres,
			'descripcion' => $descripcion,
		];
        $valor=new Especialidad();
        $respuesta=$valor->registrarEspecialidad($data);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/especialidades'))->with('mensaje','1');
		} else {
			return redirect()->to(base_url('/menu/especialidades'))->with('mensaje','0');
		}
    }
    
    public function index()
	{
		$Crud = new Especialidad();
		$datos = $Crud->listarEspecialidades();

		$mensaje = session('mensaje');

		$data = [
					"especialidades" => $datos,
					"mensaje" => $mensaje
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('especialidades/espec_visualizar', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$nombres= $this->request->getPost('nombres');
        $descripcion= $this->request->getPost('descripcion');
        $data=[
			'nombre_esp' => $nombres,
			'descripcion' => $descripcion,
		];
		$id_especialidad = $this->request->getPost('id_especialidad');;

		$Crud = new Especialidad();

		$respuesta = $Crud->actualizar($data, $id_especialidad);

		if ($respuesta) {
			return redirect()->to(base_url('/menu/especialidades'))->with('mensaje','2');
		} else {
			return redirect()->to(base_url('/menu/especialidades'))->with('mensaje','3');
		}
	}

	public function eliminar($id_especialidad){
		$Crud = new Especialidad();
		$data = ["id_especialidad" => $id_especialidad];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/menu/especialidades')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/menu/especialidades')->with('mensaje','5');
		}
	}
}
