<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $qty = 1;
    public $quantity = 0;
    public $color_id =""; //esta variable la sincronizamos con el select mediante wire:model
    public $options = [
        'size_id' => null
    ];

    public function mount(){ // es como el metodo constructor
        $this->colors = $this->product->colors;
        $this->options['image'] = Storage::url($this->product->images->first()->url); // guardamos la imagen en la variable opciones

    }
    
    //metodo a la escucha cada vez que selecciona un color - asignamos el valor del stock a la variable $quantity
    public function updatedColorId($value){ // este metodo se va a ejecutar cada vez que modifiquemos el valor de $color_id
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id); //pasamos el helpers // en value se almacena el id del color que seleccionamos en el select
        $this->options['color'] = $color->name;
    }

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

         $this->quantity = qty_available($this->product->id, $this->color_id);

         //reseteamos la propiedad qty
         $this->reset('qty');
         // emitimos el evento al compontente del carrito
         $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    
}
