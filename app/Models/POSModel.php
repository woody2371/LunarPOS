<?php

namespace App\Models;

use CodeIgniter\Model;

class POSModel extends Model
{
    protected $table = 'fatcoin.productlist';
    protected $allowedFields = ['description', 'price', 'category'];

    public function loadPOS($category = "Beers Wines Cocktails")
    {
        #initialize DB/Builder for future queries
        $db      = \Config\Database::connect();
        $builder = $db->table('fatcoin.productlist');

        #Return all products if no category is passed
        if ($category === false) {
            return $this->findAll();
        }

        #Split the categories being passed. Expected format is the be delimited by spaces, e.g 'wines beers tickets'
        $categoryArray = explode(" ", $category);

        #Select all products matching any of the categories
        $builder->wherein('category', $categoryArray);
        $query = $builder->get();

        #Return results as an array of arrays, E,G $query[0][description] would be the first product
        return $query->getResult('array') ;
    }
}