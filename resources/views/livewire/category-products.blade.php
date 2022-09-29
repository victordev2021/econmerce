<div wire:init='loadPost'>
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
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

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="fa-3x text-navy-500 flex items-center justify-center h-56">
            {{-- <i class="fas fa-spinner fa-spin"></i>
            <i class="fas fa-circle-notch fa-spin"></i>
            <i class="fas fa-sync fa-spin"></i>
            <i class="fas fa-cog fa-spin"></i> --}}
            <i class="fas fa-spinner fa-pulse"></i>
            {{-- <i class="fas fa-stroopwafel fa-spin"></i> --}}
        </div>
    @endif
</div>
