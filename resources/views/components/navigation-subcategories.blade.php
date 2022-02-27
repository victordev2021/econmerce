@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-gray-500 mb-3">Subcategorías</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li><a class="text-gray-500 font-semibold inline-block py-1 px4 hover:text-ochre-400"
                        href="">{{ $subcategory->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img src="{{ Storage::url($category->image) }}" alt="" srcset="">
    </div>
</div>
