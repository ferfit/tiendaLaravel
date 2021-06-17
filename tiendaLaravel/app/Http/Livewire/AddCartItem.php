<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItem extends Component
{

    // creamos una variable para asignarle el valor del stock del producto
    public $product, $quantity; //en $product almacenamos la variable del producto que se la pasamos al este componente
    public $options =[
        'color_id' => null,
        'size_id' => null
    ]; // aca vamos a almacenar las opciones adicionales para el carrito
    
    public function mount(){
        $this->quantity = $this->product->quantity; // ahora almacenamos el stock en la variable $quantity
        $this->options['image'] = Storage::url($this->product->images->first()->url); // guardamos la imagen en la variable opciones
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

    //Agregamos el producto al carrito
    public function addItem(){

        

        Cart::add(['id' => $this->product->id,
         'name' => $this->product->name, 
         'qty' => $this->qty, 
         'price' => $this->product->price, 
         'weight' => 550, 
         'options' => $this->options
         ]);

         $this->emitTo('dropdown-cart','render');
    }

    //metodo render
    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
