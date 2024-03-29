<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShopingCart extends Component
{
    public $listeners = ['render'];
    public function render()
    {
        return view('livewire.shoping-cart');
    }
    public function destroy()
    {
        Cart::destroy();
        $this->emitTo('dropdown-cart', 'render');
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        // dd('Deleting...', $rowId);
    }
}
