<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //relacion 1 a muchos
    public function sizes(){
        return $this->hasMany(Size::class)
;    }
    
    // relacion 1 a muchos inversa
    public function brands(){
        return $this->belongsTo(Brand::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    //relacion 1 a muchos polimorfica
    public function images(){
        return $this->morphToMany(Image::class,'imageable'); //el segundo parametro es el metodo que creamos en el modelo model
    }

}
