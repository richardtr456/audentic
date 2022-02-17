<?php

namespace App\Controllers;
use App\Models\Tratamiento;
use App\Models\Sesion;


class Sesiones extends BaseController{
    public function registrar(){
		//aca debo editar para recepcionar los datos de las especialidades y luego puedo asi recepcionarlos
		//*YA ESTA
		$paciente=$this->request->getPost('paciente');
		$profesional= $this->request->getPost('profesional');
        $servicio= $this->request->getPost('servicio');
        $costo= $this->request->getPost('costo');
		$descripcion= $this->request->getPost('descripcion');

        $data=[
			'id_servicio' => $servicio,
			'id_usuario' => $paciente,
			'id_profesional'=>$profesional,
			'costo_inicial'=>$costo,
			'descripcion_trata'=>$descripcion
		];

         $valor=new Tratamiento();
         $respuesta=$valor->registrarTratamiento($data);
         if ($respuesta) {		 	
		 	return redirect()->to(base_url('/menu/tratamientos'))->with('mensaje','1');	
		 } else {
		 	return redirect()->to(base_url('/menu/tratamientos'))->with('mensaje','0');
		 }
    }
    public function cargar($parametro)
	{
        $sesion=new Sesion();
        $sesiones=$sesion->listarSesiones($parametro);
        $mensaje = session('mensaje');
		$data = ["id_tratamiento" => $parametro,
                 "sesiones"=>$sesiones,
                 "mensaje" => $mensaje
                                    ];
		// return view('menu/cabecera_falsa').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('tratamientos/tra_visualizar',$data).view('menu/6-footeralt');
		//return view('prueba');
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('sesiones/ses_visualizar', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$paciente=$this->request->getPost('paciente');
		$profesional= $this->request->getPost('profesional');
        $servicio= $this->request->getPost('servicio');
        $costo= $this->request->getPost('costo');
		$descripcion= $this->request->getPost('descripcion');

        $data=[
			'id_servicio' => $servicio,
			'id_usuario' => $paciente,
			'id_profesional'=>$profesional,
			'costo_inicial'=>$costo,
			'descripcion_trata'=>$descripcion
		];
        $id_tratamiento = $this->request->getPost('id_tratamiento');

		$Crud = new Tratamiento();

		$respuesta = $Crud->actualizar($data, $id_tratamiento);
        if ($respuesta) {
			return redirect()->to(base_url('/menu/tratamientos'))->with('mensaje','2');
	
		} else {
			return redirect()->to(base_url('/menu/tratamientos'))->with('mensaje','3');
		}
	}

	public function eliminar($id_tratamiento){
		$data = ["id_tratamiento" => $id_tratamiento];
		$delete_especialidad = new Tratamiento();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		
		if ($delete_especialidades) {		
				return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','4');
			
		} else {
			return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','5');
		}
	}
}
