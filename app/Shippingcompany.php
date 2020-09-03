<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippingcompany extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'phone',
        'email'
             
    ];
}
