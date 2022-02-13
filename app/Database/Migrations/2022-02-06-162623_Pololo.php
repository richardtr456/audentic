<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pololo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pololo'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre_pololo'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tipo_pololo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_pololo', true);
        $this->forge->createTable('Pololo');
    }

    public function down()
    {
        //
    }
}
