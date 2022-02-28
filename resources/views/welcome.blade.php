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
                    slidesToScroll: 2,
                    slidesToShow: 2,
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });
            })
        </script>
    @endpush
</x-app-layout>
