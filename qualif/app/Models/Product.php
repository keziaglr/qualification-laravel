<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=['producttype_id', 'name', 'price', 'description'];

    function producttype(){
        return $this->hasOne(Producttype::class, 'id', 'producttype_id');
    }

    function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
