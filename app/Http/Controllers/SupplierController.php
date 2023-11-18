<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $suppliers = Supplier::all();
        return view('suppliers.index', ['suppliers' => $suppliers]);
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
        $suppliers = New Supplier();
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->address = $request->address;
        $suppliers->phone = $request->phone;
        $suppliers->email = $request->email;
        if ($suppliers->save()) {
            return redirect()->back()->with('Supplier Created Successfully');
        }
        return redirect()->back()->with('Supplier Creation Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier, string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->save();
        return redirect()->back()->with('success', 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back()->with('success', 'Supplier Deleted Successfully');
    }
}
