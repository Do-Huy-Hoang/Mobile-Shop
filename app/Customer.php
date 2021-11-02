<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = ['name', 'id', 'phone', 'gender', 'birthday', 'user_id', 'address'];
}
