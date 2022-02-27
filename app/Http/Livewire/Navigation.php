<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();
        // $img = $categories->first()->image;
        // dd($img);
        return view('livewire.navigation', compact('categories'));
    }
}
