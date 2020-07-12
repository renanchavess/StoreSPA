<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $table = 'category_products';    
    public $incrementing = false;
    protected $primaryKey = ['product_id', 'category_id']; 
}
