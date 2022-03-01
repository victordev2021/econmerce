<x-app-layout>
    {{-- SLIDER CATEGORIAS --}}
    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-4">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">{{ $category->name }}</h1>
                    <a href="{{ route('categories.show', $category) }}"
                        class="text-ochre-400 ml-2 font-semibold hover:text-ochre-300 hover:underline">Ver
                        más...</a>
                </div>
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    {{-- JAVA SCRIPT --}}
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                        // screens greater than >= 775px
                        breakpoint: 640,
                        settings: {
                            // Set to `auto` and provide item width to adjust to viewport
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            itemWidth: 64,
                            duration: 0.25
                        }
                    }, {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3.5,
                            slidesToScroll: 3,
                            itemWidth: 64,
                            duration: 0.25
                        }
                    }]
                });
            })
        </script>
    @endpush
</x-app-layout>
