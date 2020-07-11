<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table ='address';
    protected $id = 'id';
    Protected $fillable=['fullname','state','city','payment_type','user_id'];
}
