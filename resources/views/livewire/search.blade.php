<div x-data class="flex-1 relative">
    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input name='name' wire:model='search' type="text" class="w-full"
            placeholder="Estas buscando algún producto?" />
        <button class="absolute top-0 right-0 h-full bg-ochre-400 flex items-center justify-center rounded-r-md px-2">
            <x-search size=35 color="white" />
        </button>
    </form>
    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away='$wire.search=""'>
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p class="">Categoría: {{ $product->subcategory->category->name }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg font-semibold leading-5 text-gray-700">No existe un producto con los parametros
                        especoficados.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
