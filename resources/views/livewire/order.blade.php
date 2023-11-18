<div class="col-lg-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;">Order Products</h4>
                        <a href="#" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct">
                            <i class="fa fa-plus"></i> Add New Product
                        </a>
                    </div>
                    <!--- <form action="{{ route('orders.store') }}" Method="POST">
                        @csrf -->
                    <div class="card-body">
                    <div class="my-2">  
                    <form wire:click.enter="InsertoCart">
                      <input type="text" name="product_code" id="" wire:model="product_code"  class="form-control" placeholder="Enter Product Code">
                      </form>
                    </div>
                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                    </div>
                    {{ $productInCart }}
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount (%)</th>
                                    <th colspan="6">Total</th>
                                   <!-- <th>
                                        <a href="#" class="btn btn-sm btn-success rounded-circle add_more">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </th>
                                -->
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                @foreach($productInCart as $key=> $cart)
                                <tr>
                                    <td class="no">{{$key + 1}}</td>
                                    <td width="30%">
                                        <input type="text" class="form-control" value="{{ $cart->product->product_name }}">           
                                    </td>
                                    <td width="15%">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button wire:click.prevent="IncrementQty({{ $cart->id }})" class="btn btn-sm btn-success">+</button>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="">{{ $cart->product_qty }}</label>
                                            </div>
                                            <div class="col-md-2">
                                            <button wire:click.prevent="DecrementQty({{ $cart->id }})"  class="btn btn-sm btn-danger">-</button>
                                            </div>
                                        </div>

                                    
                                    </td>
                                    <td><input type="number" value="{{ $cart->product_price }}" class="form-control price" readonly></td>
                                    <td><input type="number" class="form-control discount"></td>

                                    <!-- this is the original code but not working, get back to this if something went wrong
                                    <td><input type="number" value="{{ $cart->product_qty * $cart->product_price }}" name="total_amount[]" id="total_amount" class="form-control total_amount"></td>
                                    <td>
                                    -->

                                    <td><input type="number" value="{{ $cart->product_qty * $cart->product_price }}"  class="form-control total_amount"></td>
                                    <td>

                                        <a href="#" class="btn btn-sm btn-danger rounded-circle" wire:click="removeProduct({{ $cart->id }})">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <!-- this is the original code but not working get back in this if something went wrong
                    <div class="card-header"><h4>Total <b class="total">{{$productInCart->sum('product_price')}}</b></h4></div>
                     -->
                     <div class="card-header"><h4>Total <b class="total">{{$totalAmount}}</b></h4></div>

                     @foreach($productInCart as $key=> $cart)
                    <form action="{{ route('orders.store') }}" method="POST">
                    
                    @csrf
                            <input type="hidden" class="form-control" name="product_id[]" value="{{ $cart->product->id }}">           
                            <input type="hidden" name="quantity[]" value="{{$cart->product_qty}}">
                            <input type="hidden" name="price[]" value="{{ $cart->product_price }}" class="form-control price" readonly>
                            <input type="hidden" name="discout[]" class="form-control discount">
                                    <!-- this is the original code but not working, get back to this if something went wrong
                                    <td><input type="number" value="{{ $cart->product_qty * $cart->product_price }}" name="total_amount[]" id="total_amount" class="form-control total_amount"></td>
                                    <td>
                                    -->
                           <input type="hidden" value="{{ $cart->product_qty * $cart->product_price }}"  class="form-control total_amount" name="total_amount">
                                   
                                @endforeach
                                
                    <div class="card-body">
        
                        <div class="btn-group">
                        {{---------This is the Print Button--------------}}
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark">
                              <i class="fa fa-print">Print</i>
                            </button>
                            <button type="button"  class="btn btn-primary">
                              <i class="fa fa-print">History</i>
                            </button>
                            <button type="button" class="btn btn-danger">
                              <i class="fa fa-print">Report</i>
                            </button>
                        </div>
                      
                        <div class="panel">
                            <div class="row">
                                
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                    <label for="">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" required>
                                        </td>
                                        <td>
                                    <label for="">Customer Name</label>
                                    <input type="number" name="customer_phone" class="form-control" required>
                                        </td>
                                    </tr>
                                </table>
                                <td>Payment Method 
                                    <div class="radio-group">
                                <span class="radio-item">
                                    <input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
                                    <label for="payment_method"><i class="fa fa-money-bill text-success"></i> Cash</label>
                                </span>
                                <span class="radio-item">
                                    <input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer" checked="checked">
                                    <label for="payment_method"><i class="fa fa-university text-danger"></i>Bank Transfer</label>
                                </span>
                                <span class="radio-item">
                                    <input type="radio" name="payment_method" id="payment_method" class="true" value="credit card" checked="checked">
                                    <label for="payment_method"><i class="fa fa-credit-card text-success"></i>Credit Card</label>
                                </span>
                                </div>
                                 </td>
                                 <td>
                                    Payment <input type="number" wire:model="pay_money" name="paid_amount" id="paid_amount" class="form-control paid_amount">
                                 </td>
                                 <td>
                                    Returning Change <input type="number" wire:model="balance" readonly name="balance" id="balance" class="form-control">
                                 </td>
                                 <td>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Save</button>
                                 </td>
                                 <td>
                                    <button class="btn btn-danger btn-lg btn-block mt-3">Calculator</button>
                                 </td>
                                 <td><a href="" class="text-center text-danger"><i class="fa fa-sign-out-alt mt-4"></i>Log-Out</a></td>
                            </div>
                         </form>
                        </div>
                        
                    </div>
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
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" name="product_name" class="form-control">
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
{{------End Modal for Create User-----}}


                </div>
            </div>
            </form>
        </div>
    </div>
</div>

