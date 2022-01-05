<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['name','image','brand','category_id','price','qty','short_desc','desc','status'];
}

 function prod()
{
	return $this->hasMany(Products::class,'id');
}