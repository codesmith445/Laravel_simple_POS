<a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i>USERS</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>PRODUCTS</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-desktop"></i>CASHIER</a>
<a href="{{ route('suppliers.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-chart"></i>SUPPLIERS</a>
<a href="{{ route('customers.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i>CUSTOMERS</a>
<a href="" class="btn btn-outline rounded-pill"><i class="fa fa-user-group"></i>INCOMING</a>
<a href="{{ route('products.barcode') }}" class="btn btn-outline rounded-pill"><i class="fa fa-barcode"></i>BARCODE</a>

<style>
    .btn-outline {
        border-color: #008b8b;
        color: #008b8b;
    }

    .btn-outline:hover {
        background-color: #008b8b;
        color: #fff;
    }
</style>