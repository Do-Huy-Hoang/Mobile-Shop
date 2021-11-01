<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable= ['name','price','feature_img_path','content','category_id','feature_img_name', 'created_at'];
    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
