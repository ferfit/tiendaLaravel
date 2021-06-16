<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            {{-- Columna imagenes --}}
            <div>
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image )
                            <li data-thumb="{{ Storage::url($image->url)}}">
                                <img src="{{ Storage::url($image->url)}}" />
                            </li> 
                        @endforeach
                        
                        
                    </ul>
                </div>
            </div>
            {{-- Columna datos --}}
            <div>
                {{-- titulo --}}
                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>
                {{-- reseñas --}}
                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-orange-500" href="">{{$product->brand->name}}</a></p>
                    <p class="ml-6">5 <i class="fas fa-star text-yellow-400 text-sm"></i></p>
                    <a class="text-orange-500 underline ml-6" href="">39 reseñas</a>
                </div>
                {{-- precio --}}
                <p class="my-4 text-2xl font-semibold text-trueGray-700">${{$product->price}}</p>
                {{-- contendor envios --}}
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-700">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-700">Se hace envios dentro de Argentina</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F')}}</p>
                        </div>

                    </div>

                </div>
                {{-- componente livewire add cart (son 3 dependiendo de sitiene color y/o size) --}}
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size',['product'=>$product])    
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color',['product'=>$product])
                @else
                    @livewire('add-cart-item',['product'=>$product])
                @endif

            </div>

        </div>
    </div>

    @push('script')
        <script>
            // Can also be used with $(document).ready()
            $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
            });
        </script>
        
    @endpush
</x-app-layout>