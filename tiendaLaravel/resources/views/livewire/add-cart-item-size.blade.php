<div x-data>
    <div>
        <p class="text-xl text-gray-700">Talla:</p>
        <select name="" id="" class="form-control" wire:model="size_id">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option  class="" value="{{$size->id}}">{{$size->name}}</option>
                
            @endforeach
        </select>
    </div>
    <div class="mt-2">
        <p class="text-xl text-gray-700">Color:</p>
        <select name="" id="" class="form-control" wire:model="color_id">
            <option value="" selected disabled>Seleccione un color</option>
            @foreach ($colors as $color)
                <option  class="capitalize" value="{{$color->id}}">{{__($color->name)}}</option>
                
            @endforeach
        </select>
    </div>

    <div class="flex mt-4">
        {{-- selectores cantidads --}}
        <div class="mr-4">
            
            <x-jet-secondary-button 
            disabled {{-- por defecto esta desabilitado --}}
            x-bind:disabled="$wire.qty <= 1 " {{-- condicion que quita o agrega "disabled" --}}
            wire:loading.attr="disabled" {{-- desabilitamos el boton cuando mientras se ejecuta el metodo decrement --}}
            wire:target="decrement" {{-- solo quiero que se anule cuando se ejecuta el metodo decrement, sino se aplicaria a todo el componente --}}
            wire:click="decrement">
                -
            </x-jet-secondary-button>
                <span class="mx-2 text-gray-700">{{$qty}}</span>
            <x-jet-secondary-button 
            x-bind:disabled="$wire.qty >= $wire.quantity " 
            wire:loading.attr="disabled" 
            wire:target="increment"
            wire:click="increment">
            
                    +
            </x-jet-secondary-button>
        </div>
        {{-- boton agregar al carrito --}}
        <div class="flex-1">
            <x-button 
            x-bind:disabled="!$wire.quantity"  {{-- 0 es false 1 o mas es true, solo cuando el valor de quantity sea cero, se desactiva, por eso el simbolo ! --}}
            class="w-full" color="orange">Agregar al carrito</x-button>
        </div>
    </div>
</div>
