<?php

namespace App\Controllers;
use App\Models\Tratamiento;
use App\Models\Sesion;
use App\Models\Pago;
use App\Models\TipoPago;



class Sesiones extends BaseController{
    public function registrar(){
		//aca debo editar para recepcionar los datos de las especialidades y luego puedo asi recepcionarlos
		//*YA ESTA
		$sesion=$this->request->getPost('sesion');
		$fecha= $this->request->getPost('fecha');
		$descripcion= $this->request->getPost('descripcion');
		$costo= $this->request->getPost('costo');
		$id_tratamiento= $this->request->getPost('id_tratamiento');


        $data=[
			'nombre_se' => $sesion,
			'costo' => $costo,
			'fecha'=>$fecha,
			'deuda'	=>'0',
			'cobrado'	=>'0',
			'id_tratamiento'=>$id_tratamiento
		];

         $valor=new Sesion();
         $respuesta=$valor->registrarSesion($data);
		 $enlace="/menu/sesiones/cargar/".$id_tratamiento;
         if ($respuesta) {		 	
		 	return redirect()->to(base_url($enlace))->with('mensaje','1');	
		 } else {
		 	return redirect()->to(base_url($enlace))->with('mensaje','0');
		 }
    }
    public function cargar($parametro)
	{
        $sesion=new Sesion();
        $sesiones=$sesion->listarSesiones($parametro);
		$tratamiento= new Tratamiento();
		$tratamientos=$tratamiento->obtenerTratamiento($parametro);
		$tipopago=new TipoPago();
		$tipopagos=$tipopago->listarTipoPagos();
		$pago=new Pago();
		$pagos=$pago->listarPagos($parametro);
        $mensaje = session('mensaje');
		$data = ["tratamiento"=>$tratamientos,
				"id_tratamiento" => $parametro,
				"tipopagos"=>$tipopagos,
                 "sesiones"=>$sesiones,
				 "pagos"=>$pagos,
                 "mensaje" => $mensaje
                                    ];
		// return view('menu/cabecera_falsa').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('tratamientos/tra_visualizar',$data).view('menu/6-footeralt');
		//return view('prueba');
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('sesiones/ses_visualizar', $data).view('menu/6-footer');
		// return view('user/user_lista', $data);
	}

    public function actualizar(){
		$sesion=$this->request->getPost('sesion');
		$fecha= $this->request->getPost('fecha');
		$descripcion= $this->request->getPost('descripcion');
		$costo= $this->request->getPost('costo');


        $data=[
			'nombre_se' => $sesion,
			'costo' => $costo,
			'fecha'=>$fecha,			
		];

        $id_sesion = $this->request->getPost('id_sesion');

		$Crud = new Sesion();
		$id_tratamiento= $this->request->getPost('id_tratamiento');
		$respuesta = $Crud->actualizar($data, $id_sesion);
        $enlace="/menu/sesiones/cargar/".$id_tratamiento;
         if ($respuesta) {		 	
		 	return redirect()->to(base_url($enlace))->with('mensaje','2');	
		 } else {
		 	return redirect()->to(base_url($enlace))->with('mensaje','3');
		 }
	}

	public function eliminar($id_sesion){
		$data = ["id_sesion" => $id_sesion];
		$delete_especialidad = new Sesion();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		
		if ($delete_especialidades) {		
				return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','4');
			
		} else {
			return redirect()->to(base_url().'/menu/tratamientos')->with('mensaje','5');
		}
	}

	//PARA PAGOS

	public function registrarPago(){
		$fechaActual = date('Y-m-d');
		
		$sesion=$this->request->getPost('pa_sesion');
		$pago=$this->request->getPost('pa_pago');
		$cuota=$this->request->getPost('pa_cuota');
		$descripcion= $this->request->getPost('descripcion');		
		$id_tratamiento= $this->request->getPost('id_tratamiento');


        $data=[
			'id_sesion' => $sesion,
			'id_tratamiento' => $id_tratamiento,
			'id_tipoPago'=>$pago,
			'cuota'	=>$cuota,
			'fecha_pago'=>$fechaActual,
		];

         $valor=new Pago();
         $respuesta=$valor->registrarPago($data);
		 $enlace="/menu/sesiones/cargar/".$id_tratamiento;
         if ($respuesta) {		 	
		 	return redirect()->to(base_url($enlace))->with('mensaje','1');	
		 } else {
		 	return redirect()->to(base_url($enlace))->with('mensaje','0');
		 }
	}

	public function eliminarPago($id_pago){
		$data = ["id_pago" => $id_pago];
		$delete_especialidad = new Pago();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		if ($delete_especialidades) {		
				return redirect()->to(base_url("/menu/tratamientos"))->with('mensaje','4');
			
		} else {
			return redirect()->to(base_url("/menu/tratamientos"))->with('mensaje','5');
		}		
        
	}


}
