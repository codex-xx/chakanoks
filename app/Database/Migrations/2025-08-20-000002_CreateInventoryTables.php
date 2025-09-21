<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInventoryTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'barcode' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 191,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => 'pcs',
            ],
            'cost_price' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
                'default' => '0.00',
            ],
            'sale_price' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
                'default' => '0.00',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('sku', false, true);
        $this->forge->addKey('barcode');
        $this->forge->createTable('inventory_items');
    }

    public function down()
    {
        $this->forge->dropTable('inventory_items');
    }
}

?>


