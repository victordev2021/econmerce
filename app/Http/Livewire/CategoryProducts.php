<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products = [];
    public function render()
    {
        return view('livewire.category-products');
    }
    public function loadPost()
    {
        $this->products = $this->category->products;
        $this->emit('glider');
    }
}
