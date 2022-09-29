<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes, $size_id = '', $color_id = '';
    public $qty = 1, $quantity = 0;
    public $colors = [];
    public $options = [];
    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
    // vat code
    public function mount()
    {
        $this->sizes = $this->product->sizes;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }
    public function updatedSizeId($value)
    {
        // dd($value);
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
    }
    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
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
        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
        // dd(Cart::content());
    }
}
