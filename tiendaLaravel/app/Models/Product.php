<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    //accesores 
    public function getStockAttribute(){
        //especificamos que tipo de producto es
        if ($this->subcategory->size) {
            //accedemos al modelo de la tabla intermedia ColorSize
            return ColorSize::whereHas('size.product', function(Builder $query){ // primer parametro, traemos la relacion con la tabla size, y seguido con la de product, luego viene la funcion
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }
        
    }

    //relacion 1 a muchos
    public function sizes(){
        return $this->hasMany(Size::class)
;    }
    
    // relacion 1 a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    //relacion 1 a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class,'imageable'); //el segundo parametro es el metodo que creamos en el modelo model
    }

    //url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
