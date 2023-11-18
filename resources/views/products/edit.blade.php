<div class="modal right fade" id="editProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Product</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea name="description" id="" cols="30" rows="4" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Brand:</label>
                <input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price:</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Quantity:</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Stocks:</label>
                <input type="number" name="alert_stock" value="{{ $product->alert_stock }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image:</label>
               <img width="40" src="{{ asset('/products/images/' . $product->product_image) }}" alt="">
                <input type="file" name="product_image" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Cancel</span>
          
        </button>
            </div>
        </form>
       </div>
      
    </div>
  </div>
</div>