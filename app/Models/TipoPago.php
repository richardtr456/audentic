<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoPago extends Model
{
    protected $table      = 'tipo_pago';
    protected $primaryKey = 'id_tipoPago';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_pago'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function registrarTipoPago($data){
            return $this->insert($data);
    }

    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    //para la lista de usuarios(admin y secretaria en el sistema)
    public function listarTipoPagos() {
         $Registros = $this->db->query("SELECT * from tipo_pago;");
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

