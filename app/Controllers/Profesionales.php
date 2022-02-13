<?php

namespace App\Controllers;
use App\Models\Profesional;
use App\Models\Especialidad;
use App\Models\Profe_Espec;

class Profesionales extends BaseController{
    public function registrar(){
		//aca debo editar para recepcionar los datos de las especialidades y luego puedo asi recepcionarlos
		//*YA ESTA
		$especialidades=$this->request->getPost('pro_especialidad');
		$nombres= $this->request->getPost('nombres');
        $telefono= $this->request->getPost('telefono');
        $cv= $this->request->getPost('cv');
        $data=[
			'nombre' => $nombres,
			'telefono' => $telefono,
			'cv' => $cv,
			'especialidades'=>$especialidades
		];
        $valor=new Profesional();
        $respuesta=$valor->registrarProfesional($data);
        if ($respuesta) {
			foreach($especialidades as $especialidad){
				$prof_espec=new Profe_Espec();
				$dato=[
					"id_profesional"=>$respuesta,
					"id_especialidad"=>$especialidad,
				];
				$prof_espec->registrarProfeEspec($dato);
			}		
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
					"especialidades"=>$especialidades,
					"mensaje" => $mensaje,					
				];

		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('profesionales/pro_lista', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$especialidades=$this->request->getPost('pro_ed_especialidad');
		$nombres= $this->request->getPost('nombres');
        $telefono= $this->request->getPost('telefono');
        $cv= $this->request->getPost('cv');
        $data=[
			'nombre' => $nombres,
			'telefono' => $telefono,
			'cv' => $cv,
			'especialidades'=>$especialidades
		];
        $id_profesional = $this->request->getPost('id_profesional');

		$Crud = new Profesional();

		$respuesta = $Crud->actualizar($data, $id_profesional);
		$data2 = ["id_profesional" => $id_profesional];
		$eliseo= new Profe_Espec();
		$eliseo->eliminar($data2);
        if ($respuesta) {
			foreach($especialidades as $especialidad){
				$prof_espec=new Profe_Espec();
				$dato=[
					"id_profesional"=>$id_profesional,
					"id_especialidad"=>$especialidad,
				];
				$prof_espec->registrarProfeEspec($dato);
			}		
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','2');
	
		} else {
			return redirect()->to(base_url('/menu/profesionales'))->with('mensaje','3');
		}
	}

	public function eliminar($id_profesional){
		$data = ["id_profesional" => $id_profesional];
		$delete_especialidad = new Profe_Espec();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		
		if ($delete_especialidades) {			
			$Crud = new Profesional();
			$respuesta = $Crud->eliminar($data);
			if($respuesta){
				return redirect()->to(base_url().'/menu/profesionales')->with('mensaje','4');
			}
		} else {
			return redirect()->to(base_url().'/menu/profesionales')->with('mensaje','5');
		}
	}
}
