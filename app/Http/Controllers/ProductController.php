<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Picqer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
      {   
        $products = Product::paginate(2);
        return view('products.index', ['products' => $products]);
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
        //product code logic
        $products = New Product();
        $product_code = $request->product_code;
        
        //image upload logic
        if($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $file->move(public_path(). '/products/images', $file->getClientOriginalName());
            $product_image = $file->getClientOriginalName();
            $products->product_image = $product_image;
        }
        //barcode logic
        $generator = New Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents('products/barcodes/'. $product_code . '.jpg',
        $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 3, 50));
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->product_code = $product_code;
        $products->barcode = $product_code . '.jpg';
        $products->alert_stock = $request->alert_stock;
        if ($products->save()) {
            return redirect()->back()->with('Products Created Successfully');
        }

        else {
            return back()->with('Error SOmething went wrong');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, string $id)
    {   
        $product = Product::find($id);
        $product_code = $request->product_code;
        //image upload logic
        if ($request->hasFile('product_image')) {
            if ($product->product_image != '') {
                $proImage_path = public_path('products/images/' . $product->product_image);
                if (file_exists($proImage_path)) {
                    unlink($proImage_path);
                }
            }
        
            $file = $request->file('product_image');
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('products/images'), $uniqueFileName);
            $product_image = $uniqueFileName;
            $product->product_image = $product_image;
        }


        //barcode image logic
        if($request->product_code != '' && $request->product_code != $product->product_code) {
            if($product->barcode != '' ) {
                $barcode_path = public_path() . '/products/barcodes/' . $product->barcode;
                unlink($barcode_path);
            }

            $generator = New Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents('products/barcodes/'. $product_code . '.jpg',
            $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 3, 50));
            $product->barcode = $product_code . '.jpg';
        }
        
       $product->product_code = $product_code;
       $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_code = $product_code;
        $product->barcode = $product_code . '.jpg';
        $product->alert_stock = $request->alert_stock;
       $product->save();    
       //$product->update($request->all());
       return redirect()->back()->with('success', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, string $id)
    {    
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }

    public function GetProductBarcodes() {
          $productsBarcode = Product::select('barcode', 'product_code')->get();
          return view('products.barcode.index', ['productsBarcode' => $productsBarcode]);
    }
}
