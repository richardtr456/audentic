<?php

namespace App\Controllers;
use App\Models\Servicio;

class Servicios extends BaseController{
    public function registrar(){
		$servicio= $this->request->getPost('servicio');
        $descripcion= $this->request->getPost('descripcion');
        $data=[
            'nombre_servicio' => $servicio,
            'descripcion_servicio' => $descripcion
		];
        $valor=new Servicio();
        $respuesta=$valor->registrarServicio($data);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/servicios'))->with('mensaje','1');
		} else {
			return redirect()->to(base_url('/menu/servicios'))->with('mensaje','0');
		}
    }
    
    public function index()
	{
		$Crud = new Servicio();
		$datos = $Crud->listarServicios();

		$mensaje = session('mensaje');

		$data = [
					"servicios" => $datos,
					"mensaje" => $mensaje
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('servicios/ser_lista', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$servicio= $this->request->getPost('servicio');
        $descripcion= $this->request->getPost('descripcion');
        $datos=[
            'nombre_servicio' => $servicio,
            'descripcion_servicio' => $descripcion
		];
		$idLogin = $this->request->getPost('id_servicio');

		$Crud = new Servicio();

		$respuesta = $Crud->actualizar($datos, $idLogin);

		if ($respuesta) {
			return redirect()->to(base_url('/menu/servicios'))->with('mensaje','2');
		} else {
			return redirect()->to(base_url('/menu/servicios'))->with('mensaje','3');
		}
	}   
	public function reporte(){
		echo view('pacientes/pacientes_reporte');
	}
	public function eliminar($idLogin){
	 	$Crud = new Servicio();
	 	$data = ["id_servicio" => $idLogin];

	 	$respuesta = $Crud->eliminar($data);

	 	if ($respuesta) {
	 		return redirect()->to(base_url().'/menu/servicios')->with('mensaje','4');
	 	} else {
	 		return redirect()->to(base_url().'/menu/servicios')->with('mensaje','5');
	 	}
	 }
}
