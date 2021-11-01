<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $fillable = ['id','name', 'description','image_path','image_name'];
}
