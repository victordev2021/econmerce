<div>
    {{-- ASIDE BAR --}}
    <div class="bg-white rounded-lg shadow-lg mb-4">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="text-gray-600 font-semibold uppercase">{{ $category->name }}</h1>
            <div class="text-gray-600 grid grid-cols-2 border-gray-300 divide-x-2 divide-gray-300">
                <i class="fas fa-border-all p-3 cursor-pointer"></i>
                <i class="fas fa-th-list p-3 cursor-pointer"></i>
            </div>
        </div>
    </div>
    {{-- CONTENT ASIDE --}}
    <div class="grid grid-cols-5">
        <aside class="text-gray-500">
            <h2 class="uppercase text-base font-semibold text-center mb-2">subcategorías</h2>
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-2 text-sm"><a class="capitalize hover:text-ochre-400"
                            href="">{{ $subcategory->name }}</a></li>
                @endforeach
            </ul>
        </aside>
        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <img class="h-56 w-full object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="" srcset="">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold text-gray-600">
                                    <a href="">{{ Str::limit($product->name, 20, '...') }}</a>
                                </h1>
                                <p class="font-bold text-gray-700">Bs {{ $product->price }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
{{-- cap. Detalle de categoría teme 14:00 --}}
