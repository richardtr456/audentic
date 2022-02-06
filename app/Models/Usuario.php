<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
}