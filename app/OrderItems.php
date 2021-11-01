<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['id', 'order_id', 'product_id', 'quantity'];

    public function order(){
        return $this->belongsTo(Orders::class,'order_id');
    }
}
