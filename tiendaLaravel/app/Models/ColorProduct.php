<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;

    //Aclaramos en que tabla vamos a trabajar
    protected $table = "color_product";

    //Relaciones 1 a muchos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
