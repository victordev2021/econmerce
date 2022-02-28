<x-app-layout>
    {{-- SLIDER CATEGORIAS --}}
    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-4">
                <h1 class="text-lg uppercase font-semibold text-gray-700">{{ $category->name }}</h1>
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    {{-- JAVA SCRIPT --}}
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 3,
                    slidesToShow: 3.5,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    }
                });
            })
        </script>
    @endpush
</x-app-layout>
