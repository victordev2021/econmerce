<div x-data>
    <p class="text-xl text-gray-700">Color: </p>
    <select wire:model="color_id" class="form-control w-full">
        <option value="" selected disabled>Seleccione un Color</option>
        @foreach ($colors as $color)
            <option class="capitalize" value="{{ $color->id }}">{{ __($color->name) }}</option>
        @endforeach
    </select>
    <p class="text-gray-700 mb-2 my-4"><span class="font-semibold text-lg">Stok disponible:</span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock }}
        @endif
    </p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click='decrement'>-
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-jet-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click='increment'>+</x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button x-bind:disabled="!$wire.quantity" wire:click='addItem' wire:loading.attr='disabled'
                wire:target='addItem' class="w-full">Agregar al carrito de
                compras</x-button>
            {{-- <x-button wire:click='addItem' wire:loading.attr='disabled' wire:target='addItem' class="w-full">
                Agregar al carrito de
                compras</x-button> --}}
        </div>
    </div>
</div>
