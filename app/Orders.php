<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'customer_id', 'status', 'created_at'];

    public function Items(){
        return $this->hasMany(OrderItems::class,'order_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class,'order_id');
    }
}
