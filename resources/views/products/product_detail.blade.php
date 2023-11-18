<div class="row">
    @forelse($product_details as $product)
      <div class="col-md-12">
        <div class="form-group">
            <label>Product ID</label>
            <img data-toggle="modal" data-target="#productPreview{{ $product->id }}" src="{{ asset('products/images/' . $product->product_image) }}" width="70" style="cursor:pointer;" alt="">
            <input type="text" value="{{$product->id}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" value="{{$product->product_name}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Code</label>
            <input type="text" value="{{$product->product_code}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" value="{{$product->price}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Brand</label>
            <input type="text" value="{{$product->brand}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Quantity</label>
            <input type="text" value="{{$product->quantity}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Stock</label>
            <input type="text" value="{{$product->alert_stock}}" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label>Product Description</label>
            <textarea name="description" id="" cols="30" rows="10" readonly>{{$product->description}}</textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group" style="text-align: center;">
            <span style="text-align: center; padding-right: 22%;">
            <img src="{{ asset('products/barcodes/' . $product->barcode) }}" width="70" style="cursor:pointer;" alt="">
            </span>
            <h4 style="padding-right: 22%;">{{$product->product_code}}</h4>
        </div>
      </div>
      @include('products.product_preview')
    @empty
       <span class="text-center">No Data Found</span>
    @endforelse
</div>

<style>
  input:read-only {
    background: #fff;
  }

  textarea:read-only {
    background: #fff;
  }
</style>