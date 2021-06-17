<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownCart extends Component
{
    protected $listeners = ['render']; // con esta linea escuchamos el emitTo del AddCartItem componente

    public function render()
    {
        return view('livewire.dropdown-cart');
    }
}
