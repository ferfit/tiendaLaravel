<div x-data> {{-- inicializamos con x-data par indicar que vamos a trabajar con alpine --}}
    <div class="flex">
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
            <x-jet-secondary-button wire:click="increment">
                    +
            </x-jet-secondary-button>
        </div>
        {{-- boton agregar al carrito --}}
        <div class="flex-1">
            <x-button class="w-full" color="orange">Agregar al carrito</x-button>
        </div>
    </div>
</div>
