<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
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
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('customer_images', 'public');
        } else {
            $imagePath = null;
        }

        $customers = New Customer();
        $customers->customer_name = $request->customer_name;
        $customers->address = $request->address;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->image = $imagePath;
        $customers->save();
        return redirect()->route('customers.index')->with('success', 'Customer Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, string $id)
    {
        $customer = Customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        if($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
            $imagePath = $newImage->store('customer_images', 'public');
            $customer->image = $imagePath;
        }
        $customer->update();

        return redirect()->route('customers.index')->with('success', 'Successfully Updated Info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Sucessfully Deleted Customer');
    }
}
