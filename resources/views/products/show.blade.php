<x-app-layout>
    <div class="container py-6">
        <div class="grid grid-cols-2 gap-6">
            {{-- slider --}}
            <div>
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- info --}}
            <div>
                <h1 class="text-xl font-bold text-gray-500">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-gray-600">Marca: <a class="underline capitalize hover:text-ochre-400"
                            href="">{{ $product->brand->name }}</a>
                    </p>
                    <p class="text-gray-600 mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-ochre-400 hover:text-ochre-500 underline" href="">39 reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-gray-700 my-4">Bs {{ $product->price }}</p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-green-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-green-600 font-semibold text-lg">Se hacen envios a toda bolivia.</p>
                            <p>Recibelo el {{ now()->addDay(7)->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
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
