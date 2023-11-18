@extends('layouts.app')
@section('content')


@livewire('products')

{{------Modal for Create Product-----}}
 <div class="modal right fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Add Product</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" autocomplete="0ff">
            @csrf
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Product Code:</label>
                <input type="text" name="product_code" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Brand:</label>
                <input type="text" name="brand" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price:</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Quantity:</label>
                <input type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Stocks:</label>
                <input type="number" name="alert_stock" class="form-control">
            </div>
            <div class="form-group pt-2">
                <label for="">Image:</label>
                <input type="file" name="product_image" id="product_image" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Save Product</button>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Cancel</span>
        </button>
            </div>
        </form>
       </div>
      
    </div>
  </div>
</div>

<style>
    .modal.right .modal-dialog {
        position: relative;
        bottom: 5%;
        right: 0;
        margin-right: 0;
    }

  /*  .modal.fade:not(.in).right .modal-dialog {
      -webkit-transform: translate3d(25%, 0, 0);
        transform: translate(25%, 0, 0);
    }

   */
 
  

</style>

@endsection