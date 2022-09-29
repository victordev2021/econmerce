<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value='Nombre de contácto' />
                <x-jet-input wire:model.defer='contact' type='text'
                    placeholder='Ingrese el nombre de la persona que recibirá el producto.' class="w-full" />
                <x-jet-input-error for='contact'></x-jet-input-error>
            </div>
            <div>
                <x-jet-label value='Teléfono de contácto' />
                <x-jet-input wire:model.defer='phone' type='text' placeholder='Ingrese un teléfono de contácto.'
                    class="w-full" />
                <x-jet-input-error for='phone'></x-jet-input-error>
            </div>
        </div>
        <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>
        <div x-data="{ envio_type: @entangle('envio_type') }">
            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" class="text-gray-600" type="radio" value="1" name="envio_type"
                    id="">
                <span class="ml-2 text-gray-700">Recojo en tienda(calle falsa 123)</span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Grátis
                </span>
            </label>
            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" class="text-gray-600" type="radio" value="2" name="envio_type"
                        id="">
                    <span class="ml-2 text-gray-700">Envío a domicilio</span>
                </label>
                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2 }">
                    {{-- Departamentos --}}
                    <div>
                        <x-jet-label value='Depatamentos'></x-jet-label>
                        <select wire:model='department_id' class="form-control w-full">
                            <option value="" disabled selected>Seleccione un departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='department_id'></x-jet-input-error>
                    </div>
                    {{-- Cities --}}
                    <div>
                        <x-jet-label value='Ciudades'></x-jet-label>
                        <select wire:model='city_id' class="form-control w-full">
                            <option value="" disabled selected>Seleccione una ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='city_id'></x-jet-input-error>
                    </div>
                    {{-- Distritos --}}
                    <div>
                        <x-jet-label value='Distrito'></x-jet-label>
                        <select wire:model='district_id' class="form-control w-full">
                            <option value="" disabled selected>Seleccione un distrito</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='district_id'></x-jet-input-error>
                    </div>
                    {{-- Distritos --}}
                    <div class="">
                        <x-jet-label value='Dirección'></x-jet-label>
                        <x-jet-input class="w-full" wire:model='address' type='text' />
                        <x-jet-input-error for='address'></x-jet-input-error>
                    </div>
                    <div class="col-span-2">
                        <x-jet-label value='Referencia'></x-jet-label>
                        <x-jet-input class="w-full" wire:model='reference' type='text' />
                        <x-jet-input-error for='reference'></x-jet-input-error>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <x-jet-button wire:loading.attr='disabled' wire:target='create_order' wire:click='create_order'
                class="mt-6 mb-4">Continuar con la
                compra</x-jet-button>
            <hr>
            <p class="text-sm text-gray-700 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
                adipisci
                perspiciatis ipsa porro quis
                reprehenderit eligendi vitae velit minus explicabo exercitationem, possimus, ullam esse nisi sapiente
                culpa qui id placeat. <a href="#"
                    class="font-semibold text-orange-500 hover:text-orange-600">Políticas y privacidad</a>
            </p>
        </div>
    </div>
    {{-- carrito --}}
    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (\Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-14 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div>
                                <p>Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="capitalize">Color: {{ __($item->options['color']) }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="capitalize">Talla: {{ __($item->options['size']) }}</p>
                                @endisset
                            </div>
                            <p>USD: {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    {{-- <li class="flex">
                        <img class="h-14 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                        </article>
                    </li> --}}
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">No tiene agregado ningún item en el carrito</p>
                    </li>
                @endforelse
            </ul>
            <div class="text-gray-700 mt-4">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span>{{ Cart::subtotal() }} USD</span>
                </p>
                <p class="flex justify-between items-center mt-2">
                    Envío
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Grátis
                        @else
                            {{ $shipping_cost }} USD
                        @endif
                    </span>
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center mt-2 font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1)
                        {{ Cart::subtotal() }} USD
                    @else
                        {{ Cart::subtotal() + $shipping_cost }} USD
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
