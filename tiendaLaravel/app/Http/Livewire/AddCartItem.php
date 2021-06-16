<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
    // creamos una variable para asignarle el valor del stock del producto
    public $product, $quantity; //en $product almacenamos la variable del producto que se la pasamos al este componente
    public function mount(){
        $this->quantity = $this->product->quantity; // ahora almacenamos el stock en la variable $quantity
    }

    //iniciamos la cantidad en 1 (esto es para la cantidad del product)
    public $qty = 1;
    // metodos que se ejecutan al hacer click en el - y + 
    public function decrement(){
        $this->qty = $this->qty - 1;
    }
    public function increment(){
        $this->qty = $this->qty + 1;
    }

    //metodo render
    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
