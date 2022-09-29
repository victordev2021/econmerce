<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;
    public $options = ['color_id' => null, 'size_id' => null];
    public function render()
    {
        return view('livewire.add-cart-item');
    }
    // vat code
    public function mount()
    {
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
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
        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
        // dd(Cart::content());
    }
}
