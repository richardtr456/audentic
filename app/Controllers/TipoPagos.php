<?php

namespace App\Controllers;
use App\Models\TipoPago;



class TipoPagos extends BaseController{
    public function registrar(){
		//aca debo editar para recepcionar los datos de las especialidades y luego puedo asi recepcionarlos
		//*YA ESTA		
		$nombre_pago= $this->request->getPost('tipopago');


        $data=[
			'nombre_pago' => $nombre_pago,			
		];

         $valor=new TipoPago();
         $respuesta=$valor->registrarTipoPago($data);
         if ($respuesta) {		 	
		 	return redirect()->to(base_url('/menu/tipopagos'))->with('mensaje','1');	
		 } else {
		 	return redirect()->to(base_url('/menu/tipopagos'))->with('mensaje','0');
		 }
    }

	public function index(){
		$tipopago=new TipoPago();
        $tipopagos=$tipopago->listarTipoPagos();
		$mensaje = session('mensaje');
		$data = ["tipopagos"=>$tipopagos,
                 "mensaje" => $mensaje
				];
		return view('menu/1-libreria').view('menu/2-header').view('menu/3-sidenav').view('menu/4-sidebar').view('tipopago/tip_visualizar', $data).view('menu/6-footer');

	}

    public function actualizar(){
		$nombre_pago= $this->request->getPost('tipopago');


        $data=[
			'nombre_pago' => $nombre_pago,			
		];

        $id_tipopago = $this->request->getPost('id_tipopago');

		$Crud = new TipoPago();
		$respuesta = $Crud->actualizar($data, $id_tipopago);
         if ($respuesta) {		 	
		 	return redirect()->to(base_url('/menu/tipopagos'))->with('mensaje','2');	
		 } else {
		 	return redirect()->to(base_url('/menu/tipopagos'))->with('mensaje','3');
		 }
	}

	public function eliminar($id_sesion){
		$data = ["id_tipoPago" => $id_sesion];
		$delete_especialidad = new TipoPago();
		$delete_especialidades= $delete_especialidad->eliminar($data);
		
		if ($delete_especialidades) {		
				return redirect()->to(base_url().'/menu/tipopagos')->with('mensaje','4');
			
		} else {
			return redirect()->to(base_url().'/menu/tipopagos')->with('mensaje','5');
		}
	}
}
