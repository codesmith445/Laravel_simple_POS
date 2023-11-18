<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{   
    public $product_details;
    public function mount() {
        $this->product_details = Product::all();
    }

    public function ProductDetails($product_id) {
        $count = $this->product_details = Product::where('id', $product_id)->get();
        //dd($count);
    }

    public function render()
    {  
        return view('livewire.products', ['products' => Product::all()]);
    }
    
}
