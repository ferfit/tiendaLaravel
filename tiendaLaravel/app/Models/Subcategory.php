<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //relacion 1 a muchos  
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion 1 a muchos inverso
    public function category(){
        return $this->belongsTo(Category::class);
    }

    
}
