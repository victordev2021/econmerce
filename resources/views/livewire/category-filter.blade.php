<div>
    {{-- ASIDE BAR --}}
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="text-gray-600 font-semibold uppercase">{{ $category->name }}</h1>
            <div class="text-gray-600 grid grid-cols-2 border-gray-300 divide-x-2 divide-gray-300">
                <i wire:click="$set('view','grid')"
                    class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-ochre-400' : '' }}"></i>
                <i wire:click="$set('view','list')"
                    class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-ochre-400' : '' }}"></i>
            </div>
        </div>
    </div>
    {{-- CONTENT ASIDE --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside class="text-gray-500">
            {{-- {{ $subcategoria }}
            {{ $marca }} --}}
            <h2 class="uppercase text-base font-semibold text-center mb-2">subcategorías</h2>
            <ul class="divide-y divide-gray-300">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a wire:click="$set('subcategoria','{{ $subcategory->name }}')"
                            class="capitalize hover:text-ochre-400 cursor-pointer {{ $subcategoria == $subcategory->name ? 'text-ochre-400 font-semibold' : '' }}">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h2 class="uppercase text-base font-semibold text-center mb-2 mt-4">Marcas</h2>
            <ul class="divide-y divide-gray-300">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a wire:click='$set("marca","{{ $brand->name }}")'
                            class="capitalize hover:text-ochre-400 cursor-pointer {{ $marca == $brand->name ? 'text-ochre-400 font-semibold' : '' }}">{{ $brand->name }}</a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button wire:click='limpiar' class="mt-4">eliminar filtros</x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-56 w-full object-cover object-center"
                                        src="{{ $product->images->first()->url }}" alt="" srcset="">
                                    {{-- <img class="h-56 w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="" srcset=""> --}}
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold text-gray-600">
                                        <a
                                            href="{{ route('products.show', $product) }}">{{ Str::limit($product->name, 20, '...') }}</a>
                                    </h1>
                                    <p class="font-bold text-gray-700">Bs {{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product='$product' />
                    @endforeach
                </ul>
            @endif
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
{{-- cap. Detalle de categoría teme 14:00 --}}
