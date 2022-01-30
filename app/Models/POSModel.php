<?php

namespace App\Models;

use CodeIgniter\Model;

class POSModel extends Model
{
    protected $table = 'fatcoin.productlist';
    protected $allowedFields = ['description', 'price', 'category'];

    public function loadPOS($category = false)
    {
        if ($category === false) {
            return $this->findAll();
        }

        return $this->where(['category' => $category])->findAll();
    }
}