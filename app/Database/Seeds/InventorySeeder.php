<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('inventory_items');
        $now = date('Y-m-d H:i:s');

        $items = [
            [ 'sku' => 'ITM-0001', 'barcode' => '8901234567890', 'name' => 'Thermal Paper Roll 80x80', 'description' => 'Standard POS thermal paper', 'quantity' => 120, 'unit' => 'roll', 'cost_price' => '12.50', 'sale_price' => '20.00' ],
            [ 'sku' => 'ITM-0002', 'barcode' => '012345678905', 'name' => 'Barcode Scanner USB', 'description' => 'Handheld 1D barcode scanner', 'quantity' => 20, 'unit' => 'pcs', 'cost_price' => '650.00', 'sale_price' => '950.00' ],
            [ 'sku' => 'ITM-0003', 'barcode' => '978020137962', 'name' => 'Receipt Printer', 'description' => '58mm thermal receipt printer', 'quantity' => 10, 'unit' => 'pcs', 'cost_price' => '1800.00', 'sale_price' => '2500.00' ],
            [ 'sku' => 'ITM-0004', 'barcode' => '4006381333931', 'name' => 'Label Paper A4', 'description' => 'A4 self-adhesive labels', 'quantity' => 50, 'unit' => 'pack', 'cost_price' => '220.00', 'sale_price' => '320.00' ],
            [ 'sku' => 'ITM-0005', 'barcode' => '5901234123457', 'name' => 'POS Terminal', 'description' => 'Android POS terminal', 'quantity' => 5, 'unit' => 'pcs', 'cost_price' => '7200.00', 'sale_price' => '8999.00' ],
        ];

        foreach ($items as $item) {
            $exists = $builder->where('sku', $item['sku'])->get()->getFirstRow();
            if ($exists) {
                continue;
            }
            $builder->insert(array_merge($item, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}

?>

