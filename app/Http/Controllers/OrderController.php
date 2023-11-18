<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $products = Product::all();
        $order = Order::all();
        // Last Order Details
        $lastID = Order_Detail::max('order_id');
        $order_receipt = Order_Detail::where('order_id', $lastID)->get();
        return view('orders.index', ['products' => $products, 'order' => $order, 'order_receipt' => $order_receipt]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
            DB::transaction(function () use ($request) {
                // Create Order
                $orders = new Order;
                $orders->name = $request->customer_name;
                $orders->phone = $request->customer_phone;
                $orders->save();
                $order_id = $orders->id;
                
    
                // Create Order Details
                if ($request->has('product_id')) {
                    for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                        $order_details = new Order_Detail();
                        $order_details->order_id = $order_id;
                        $order_details->product_id = $request->product_id[$product_id] ?? null;
                        $order_details->price = $request->price[$product_id] ?? null;
                        $order_details->quantity = $request->quantity[$product_id] ?? null;
                        $order_details->discount = $request->discount[$product_id] ?? null;
                        $order_details->total_amount = $request->total_amount[$product_id] ?? null;
                        $order_details->save();
                    }
                }
    
                // Create Transaction
                $transaction = new Transaction;
                $transaction->order_id = $order_id;
                $transaction->user_id = auth()->user()->id;
                $transaction->balance = $request->balance;
                $transaction->paid_amount = $request->paid_amount;
                $transaction->payment_method = $request->payment_method;
                $transaction->transac_amount = $order_details->total_amount; // Using the last product's amount
                $transaction->transac_date = now(); // Use Carbon for date handling
                $transaction->save();
                Cart::where('user_id', auth()->user()->id)->delete();
    
                // Last Order History
                $products = Product::all();
                $order_details = Order_Detail::where('order_id', $order_id)->get();
                $orderedBy = Order::where('id', $order_id)->get();
    
                // Return view
                return view('orders.index', [
                    'products' => $products,
                    'order_details' => $order_details,
                    'customer_orders' => $orderedBy
                ]);

            });
    
           return redirect()->route('orders.index')->with('success', 'Product Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
