<?php

namespace App\Controllers;
use App\Models\Profesional;
use App\Models\Especialidad;

class Profesionales extends BaseController{
    public function registrar(){
		$nombres= $this->request->getPost('nombres');
        $telefono= $this->request->getPost('telefono');
        $cv= $this->request->getPost('cv');
        $data=[
			'nombre' => $nombres,
			'telefono' => $telefono,
			'cv' => $cv,
		];
        $valor=new Profesional();
        $respuesta=$valor->registrarProfesional($data);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','1');
		} else {
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','0');
		}
    }
    
    public function index()
	{
		$Crud = new Profesional();
		$datos = $Crud->listarProfesionales();
		$especialidad = new Especialidad();
		$especialidades=$especialidad->listarEspecialidades();
		$mensaje = session('mensaje');

		$data = [
					"profesionales" => $datos,
					"mensaje" => $mensaje,
					"especialidades"=>$especialidades
					
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('profesionales/pro_lista', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$nombres= $this->request->getPost('nombres');
        $telefono= $this->request->getPost('telefono');
        $cv= $this->request->getPost('cv');
        $data=[
			'nombre' => $nombres,
			'telefono' => $telefono,
			'cv' => $cv,
		];
		$id_profesional = $this->request->getPost('id_profesional');;

		$Crud = new Profesional();

		$respuesta = $Crud->actualizar($data, $id_profesional);

		if ($respuesta) {
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','2');
		} else {
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','3');
		}
	}

	public function eliminar($id_profesional){
		$Crud = new Profesional();
		$data = ["id_profesional" => $id_profesional];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/menu/profesionales')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/menu/profesionales')->with('mensaje','5');
		}
	}
}
