<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $table ='products';
    protected $primaryKey ='id';
    protected $fillable = [
        'pro_name',
        'pro_price',
        'pro_saleprice',
        'pro_qty',
        'pro_info',
        'supplier_id',
        'category_id',
        'image'
        
               
    ];
}
