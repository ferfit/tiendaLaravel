<div class="flex-1 relative">
    {{-- incluimos un componente de jet --}}
    <x-jet-input type="text" class="w-full" placeholder="Escribe el producto que necesitas..."/>
    {{--incluimos el componente que creamos search y le pasamos valores para darle tamaño segun dispositivo--}}    
    <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white"/>
    </button> 
    
</div>
