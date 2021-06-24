<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItemSize extends Component
{
    public $product, $sizes;

    public $size_id = "";

    public $colors = [];

    public $qty = 1;

    public $quantity = 0;

    public $color_id = "";

    public $options = [];

    //metodo mount/constructor
    public function mount(){
        $this->sizes = $this->product->sizes;
        $this->options['image'] = Storage::url($this->product->images->first()->url); // guardamos la imagen en la variable opciones

    }

    //metodos que estan a la escucha
    public function updatedSizeId($value){
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
    }
    public function updatedColorId($value){
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
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

         $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);

         //reseteamos la propiedad qty
         $this->reset('qty');
        // emitimos el evento al compontente del carrito
         $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
