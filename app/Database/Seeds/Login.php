<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Login extends Seeder
{
    public function run()
    {
        $data = [
            'usuario' => 'richardtr123',
            'contrasena'    => password_hash('def_abc',PASSWORD_BCRYPT),
            'rol' => 'admin'
        ];

        // Using Query Builder
        $this->db->table('Login')->insert($data);
    }
}
