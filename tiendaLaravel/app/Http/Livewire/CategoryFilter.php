<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;
    public $category, $subcategoria, $marca;

    //vista grid
    public $view = "grid";

    public function limpiar (){
        $this->reset(['subcategoria','marca']);
    }

    public function render()
    {
        /* $products = $this->category->products()
                                    ->where('status',2)
                                    ->paginate(12); */
        /* creamos la consulta */
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){ /* usamos whereHas para llamar al arelacion, el primerp parametro el la relacion */
            $query->where('id', $this->category->id);
        });
        /*cremos el filtro subcategoria*/
        if($this->subcategoria){ /* si existe algo en la variable subcategoria modificamos la consulta */
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){ /* usamos whereHas para llamar al arelacion, el primerp parametro el la relacion */
                $query->where('name', $this->subcategoria);
            });
        }
        /*cremos el filtro marca*/
        if($this->marca){ 
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){ 
                $query->where('name', $this->marca);
            });
        }

        /* creamos la coleccion*/
        $products = $productsQuery->paginate(12);

        return view('livewire.category-filter',compact('products'));
    }
}
