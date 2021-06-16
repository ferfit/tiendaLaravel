<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
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
