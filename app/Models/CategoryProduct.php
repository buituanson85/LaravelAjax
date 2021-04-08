<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = "category_products";

    protected $fillable = [
        "name","description","status"
    ];
    protected $primaryKey = 'id';


    public function product(){
        return $this->hasOne('App\Models\Product');
    }
}
