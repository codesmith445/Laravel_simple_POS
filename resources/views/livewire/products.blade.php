<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-8">
           <div class="card">
                <div class="card-header"><h4 style="float: left;">Add New Products</h4><a href="" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="fa fa-plus"></i>Add New Product</a></div>
                <div class="card-body">
                    @include('products.table')
                </div>
            </div>
           </div>
           <div class="col-md-3">
           <div class="card">
                <div class="card-header"><h4>Product Details</h4></div>
                <div class="card-body">
                    @include('products.product_detail')
                </div>
            </div>
           </div>
        </div>
    </div>
 </div>




