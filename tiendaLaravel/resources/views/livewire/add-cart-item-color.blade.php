<div x-data>
    <p class="text-gray-700 mb-2"><span class="font-semibold text-lg">Stock disponible:</span>
        {{$quantity}}
     </p>
    <p class="text-xl text-gray-700">Color:</p>
    <select wire:model="color_id" class="form-control"> {{-- clase creada por nosotros --}}
        <option value="" selected disabled>Seleccione un color</option>
        @foreach ($colors as $color) {{-- la variable $colors es la del controlador del componente --}}
            <option value="{{$color->id}}">{{$color->name}}</option>
        @endforeach
    </select>

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
