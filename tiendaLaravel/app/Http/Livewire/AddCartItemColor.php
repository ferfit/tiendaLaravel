<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $qty = 1;
    public $quantity = 0;
    public $color_id =""; //esta variable la sincronizamos con el select mediante wire:model

    public function mount(){ // es como el metodo constructor
        $this->colors = $this->product->colors;
    }
    
    //asignamos el valor del stock a la variable $quantity
    public function updatedColorId($value){ // este metodo se va a ejecutar cada vez que modifiquemos el valor de $color_id
        $this->quantity = $this->product->colors->find($value)->pivot->quantity; // en value se almacena el id del color que seleccionamos en el select
    }

    // metodos que se ejecutan al hacer click en el - y + 
    public function decrement(){
        $this->qty = $this->qty - 1;
    }
    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    
}
