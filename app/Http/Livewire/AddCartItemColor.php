<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $color_id = '';
    public $qty = 1, $quantity = 0;
    public $options = ['size_id' => null];
    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
    // vat code
    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }
    public function updatedColorId($value)
    {
        // dd($value);
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name;
    }
    public function increment()
    {
        $this->qty++;
    }
    public function decrement()
    {
        if ($this->qty > 0) {
            $this->qty--;
        }
    }
    public function addItem()
    {
        // dd('ok!!!');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);
        $this->quantity = qty_available($this->product->id, $this->color_id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
        // dd(Cart::content());
    }
}
