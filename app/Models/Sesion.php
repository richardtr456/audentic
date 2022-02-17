<?php

namespace App\Models;

use CodeIgniter\Model;

class Sesion extends Model
{
    protected $table      = 'sesion';
    protected $primaryKey = 'id_sesion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_se','deuda','costo','cobrado','fecha'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function registrarTratamiento($data){
            return $this->insert($data);
    }

    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    //para la lista de usuarios(admin y secretaria en el sistema)
    public function listarSesiones($id_tratamiento) {
         $Registros = $this->db->query("SELECT * from sesion where id_tratamiento=$id_tratamiento;");
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

