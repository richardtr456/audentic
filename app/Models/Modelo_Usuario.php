<?php

namespace App\Models;

use CodeIgniter\Model;




class Modelo_Usuario extends Model
{
    protected $table      = 'Usuario';
    protected $primaryKey = 'usuario_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    //* */ Datos que se pueden manipular
    protected $allowedFields = ['usu_nick'];
    //*

    protected $useTimestamps = false;
    // Estas columnas deben estar creadas en la bd para que se pueda hacer un seguimiento a la creacion de data
    // created_at -> fecha y hora
    // updated_at -> fecha y hora
    // deleted_at -> entero
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function consultar(){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuario');
        $builder->select('usuario_id, usu_nick, usu_password');
        $builder->from('Usuario');
        $query = $builder->get();
        return array($query);
    }
    


}