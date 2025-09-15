<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\InventoryItemModel;

class Items extends BaseController
{
    public function index(): string
    {
        $model = new InventoryItemModel();
        $samples = $model->orderBy('id', 'ASC')->limit(5)->find();
        return view('inventory/items/index', [
            'title' => 'SCMS — Inventory',
            'active' => 'inventory',
            'samples' => $samples,
        ]);
    }

    public function search()
    {
        $barcode = $this->request->getGet('barcode') ?? $this->request->getPost('barcode');
        if (!$barcode) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'barcode is required']);
        }
        $model = new InventoryItemModel();
        $item = $model->findByBarcode($barcode);
        if (!$item) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Item not found']);
        }
        return $this->response->setJSON(['data' => $item]);
    }
}

?>

