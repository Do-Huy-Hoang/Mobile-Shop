<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    protected $fillable = ['name', 'id_parent'];

    public function product(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
