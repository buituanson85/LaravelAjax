<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProduct;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        "name", "short_description","description","regular_price","sale_price", "SKU", "status", "featured","quantity","image","category_id"
    ];
    public function category(){
        return $this->belongsTo('App\Models\CategoryProduct');
    }
}
