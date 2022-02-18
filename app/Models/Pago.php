<?php

namespace App\Models;

use CodeIgniter\Model;

class Pago extends Model
{
    protected $table      = 'pago';
    protected $primaryKey = 'id_pago';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_sesion','id_tratamiento','id_tipoPago','cuota','fecha_pago'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function registrarPago($data){
            return $this->insert($data);
    }

    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    //para la lista de usuarios(admin y secretaria en el sistema)
    public function listarPagos($parametro) {
         $Registros = $this->db->query("SELECT a.id_pago,a.id_sesion,a.id_tratamiento,a.id_tipoPago,a.cuota,a.fecha_pago,
                                            b.descripcion_trata,
                                            c.nombre_se,
                                            d.nombre_pago
                                            from pago a INNER JOIN tratamiento b on a.id_tratamiento=b.id_tratamiento
                                                        INNER JOIN sesion c on c.id_sesion = a.id_sesion
                                                        INNER JOIN tipo_pago d on d.id_tipoPago=a.id_tipoPago where a.id_tratamiento=$parametro;");
         return $Registros->getResult();
     }
     public function actualizar($data, $idLogin) {
         return $this->update($idLogin,$data);
     }

     public function eliminar($data) {
         return $this->delete($data);
     }

     public function obtenerNombre($data) {
         $Nombres =  $this->db->table('Login');
         $Nombres->where($data);
         return $Nombres->get()->getResultArray();
     }
    
}

