<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;

class Order extends Component
{   
    public $orders, $products = [], $product_code, $message = '', $productInCart;
    public $pay_money;
    public $pay_balance;


    public function mount() {
        $this->products = Product::all();
        $this->productInCart = Cart::all();
    }
    
    public function InsertoCart(){
        $countProduct = Product::where('id', $this->product_code)->first();
        if(!$countProduct) {
            return $this->message = 'Product Not Found';
        }

        $countCartProduct = Cart::where('product_id', $this->product_code)->count();
        if($countCartProduct > 0) {
            return $this->message = 'Product' . $countProduct->product_name . 'Already Exist in Cart Please Add Quantity';
        }

          
            $add_to_cart = New Cart;
            $add_to_cart->product_id = $countProduct->id;
            $add_to_cart->product_qty = 1;
            $add_to_cart->product_price = $countProduct->price;
            $add_to_cart->user_id = auth()->user()->id;
            $add_to_cart->save();
            
            $this->productInCart->prepend($add_to_cart);

            $this->product_code = ' ';
            return $this->message = "Product Added Successfully";
           
        
    }

    public function IncrementQty($cartId) {
        $carts = Cart::find($cartId);
        $carts->increment('product_qty', 1);
        
        $this->mount();
    }


    public function DecrementQty($cartId) {
        $carts = Cart::find($cartId);
        $carts->decrement('product_qty', 1);
        
        $this->mount();
    }

    public function removeProduct($cartId) {
           $deleteCart = Cart::find($cartId);
           $deleteCart->delete();
           $this->message = "Product Removed From Cart";
           $this->productInCart = $this->productInCart->except($cartId);
    }

    public function render()
    {   
        $totalAmount = $this->productInCart->sum(function ($cartItem) {
            return $cartItem->product_qty * $cartItem->product_price;
        });
    
        // Update the balance based on the total amount
        $this->balance = $totalAmount;
    
        return view('livewire.order', ['totalAmount' => $totalAmount]);    
    }
}
