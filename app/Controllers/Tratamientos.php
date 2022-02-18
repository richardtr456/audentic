<?php

namespace App\Controllers;
use App\Models\Tratamiento;
use App\Models\Profesional;
use App\Models\Especialidad;
use App\Models\Profe_Espec;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Servicio;
use App\Models\Sesion;

class Tratamientos extends BaseController{
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
    
    public function index()
	{
		$Crud = new Tratamiento();
		$datos = $Crud->listarTratamientos();
		$especialidad = new Servicio();
		$especialidades=$especialidad->listarServicios();	
		$profesional= new Profesional();
		$profesionales=$profesional->listarProfesionales();
		$paciente = new Paciente();
		$pacientes=$paciente->listarPacientes();
		$mensaje = session('mensaje');

		$data = [
					"tratamientos" => $datos,
					"servicios"=>$especialidades,
					"profesionales"=>$profesionales,
					"pacientes"=>$pacientes,
					"mensaje" => $mensaje,					
				];

		// return view('menu/cabecera_falsa').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('tratamientos/tra_visualizar',$data).view('menu/6-footeralt');
		//return view('prueba');
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('tratamientos/tra_visualizar', $data).view('menu/6-footer');
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
		$pago=new Pago();
		$pagos=$pago->eliminar($id_tratamiento);
		$sesion=new Sesion();
		$sesiones=$sesion->eliminar($data);
		$delete_especialidad = new Tratamiento();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		
		if ($delete_especialidades) {		
				return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','4');
			
		} else {
			return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','5');
		}
	}
}
