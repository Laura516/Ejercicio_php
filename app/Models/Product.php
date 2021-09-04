<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// poduct -> va a buscar la tabla products
// los modelos se crean en singular
class Product extends Model
{
    use HasFactory;
    
    function brand(){
        return $this->belongsTo(Brand::class);
    }

    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
