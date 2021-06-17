<div x-data> {{-- inicializamos con x-data par indicar que vamos a trabajar con alpine --}}
    <p class="text-gray-700 mb-2"><span class="font-semibold text-lg">Stock disponible:</span>
        {{$quantity}}
     </p>
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
            wire:click="addItem"
            wire:loading.attr="disabled" {{-- mientras carga un proceso se desabilita, pero cual? --}}
            wire:target="addItem"  {{-- aca indico a cual metodo --}}
            class="w-full" color="orange">Agregar al carrito</x-button>
        </div>
    </div>
</div>
