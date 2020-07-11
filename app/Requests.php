<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'user_id',
        'req_proname',
        'req_qty',
        'req_prospec',
        'status'
             
    ];
}
