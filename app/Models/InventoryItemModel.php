<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryItemModel extends Model
{
    protected $table = 'inventory_items';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'sku', 'barcode', 'name', 'description', 'quantity', 'unit', 'cost_price', 'sale_price', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function findByBarcode(string $barcode): ?array
    {
        $row = $this->where('barcode', $barcode)->first();
        return $row ?: null;
    }
}

?>


