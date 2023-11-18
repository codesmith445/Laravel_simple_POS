@extends('layouts.app')
@section('content')
<head>
    
</head>
 <div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
           <div class="card">
                <div class="card-header"><h4 style="float: left;">Product BarCode</h4></div>
                <div class="card-body">
                    <div id="print">
                        <div class="row">
                            @forelse($productsBarcode as $barcode)
                            <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('products/barcodes/'. $barcode->barcode ) }}" alt="" style="max-width: 100%; max-height: 100px;">
                                    <h4 class="text-center" style="padding: 1em; margin-top: 1em;">{{$barcode->product_code}}</h4>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center">No Data Found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
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