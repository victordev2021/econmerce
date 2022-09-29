<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Color;
use App\Models\Size;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty, $quantity;
    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        $color = Color::where('name', $item->options->color)->first();
        $size = Size::where('name', $item->options->size)->first();
        $this->quantity = qty_available($item->id, $color->id, $size->id);
    }
    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
    public function increment()
    {
        $this->qty++;
        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }
    public function decrement()
    {
        if ($this->qty > 0) {
            $this->qty--;
            Cart::update($this->rowId, $this->qty);
            $this->emit('render');
        }
    }
}
