  
  <div>
  <table class="table table-bordered table-left">
                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Brand</th>
                                <th>Sell Price</th>
                                <th>Quantity</th>
                                <th>Stock</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        @foreach($products as $key => $product)
                        <tbody>
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <th style="cursor:pointer" data-toggle="tooltip" data-placement="right" title="Click to View Details" wire:click="ProductDetails({{$product->id}})">{{ $product->product_name }}</th>
                                <th>{{ $product->description }}</th>
                                <th>{{ $product->brand }}</th>
                                <th>{{ number_format($product->price, 2) }}</th>
                                <th>{{ $product->quantity }}</th>
                                <th>@if($product->quantity < $product->alert_stock)<span>Low Stock > {{ $product->alert_stock }}</span>
                                    @else<span>{{ $product->alert_stock }}</span>
                                    @endif 
                                    </th>
                                <td>
                                <div class="btn-group">
                                <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editProduct{{$product->id}}"><i class="fa fa-edit"></i>Edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct{{$product->id}}"><i class="fa fa-trash"></i>Delete</a>
                                </div>
                                </td>
                            </tr>
                    
                        </tbody>
                        {{---Modal For Edit Product---}}
                            
                        {{----Paginate Link Boostrap----}}
                        <div class="pagination justify-content-right">
        
    </div>
                        {{----End Paginate Link Boostrap----}}
                        
                        {{----Include Edit/ Edit is in other folder----}}
                       @include('products.edit')
                        {{----EndInclude Edit/ Edit is in other folder----}}
                        

    {{-------Modal For Delete Button--------}}
        
        @include('products.delete')

    {{-------End Modal For Delete Button--------}}
        
    {{---End Modal For Edit User---}}
    
                        @endforeach

                        </table>

                        </div>