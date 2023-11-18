@extends('layouts.app')
  @section('content')
  <div class="container">
      <div class="col-lg-12">
          <div class="row">
            <div class="col-md-9">
            <div class="card">
                  <div class="card-header"><h4 style="float: left;">Add New Supplier</h4><a href="" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCustomer"><i class="fa fa-plus"></i>Add New Customer</a></div>
                  <div class="card-body">
                      <table class="table table-bordered table-left">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Supplier Name</th>
                              <th>Address</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($customers as $key => $customer)
                          <tr>
                          <th>{{$key+1}}</th>
                          <th><img src="{{ asset('storage/' .$customer->image) }}" style="height: 100px; width: 100px;" alt=""></th>
                          <th>{{$customer->customer_name}}</th>
                          <th>{{$customer->address}}</th>
                          <th>{{$customer->phone}}</th>
                          <th>{{$customer->email}}</th>
                          
                              <td>
                                <div class="btn-group">
                                <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editCustomer{{$customer->id}}"><i class="fa fa-edit"></i>Edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCustomer{{$customer->id}}"><i class="fa fa-trash"></i>Delete</a>
                                </div>
                              </td>
                          </tr>
                          
                        </tbody>
                        {{------ Modal for Edit Supplier-----}}


                        <div class="modal right fade" id="editCustomer{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="height: 100%; padding-top: 50px">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Customer</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" value="{{$customer->id}}">
        </button>
        
      </div>
      <div class="modal-body">
        <form action="{{ route('customers.update', ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" value="{{$customer->customer_name}}" name="customer_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Address:</label>
                <input type="text" value="{{$customer->address}}" name="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone:</label>
                <input type="text" value="{{$customer->phone}}" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" value="{{$customer->email}}" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image:</label>
                <p>{{$customer->image}}</p>
                <img src="{{ asset('storage/' .$customer->image) }}" style="height: 90px; width: 90px;" alt="">
                <input type="file"  name="new_image" class="form-control">
            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Update User</button>
            </div>
        </form>
        </div>
      
    </div>
  </div>
</div>
</div>
{{------End Modal for Edit Supplier-----}}




    {{----------Modal For Delete Section------------------}}

<div class="modal right fade" id="deleteCustomer{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Delete Customer</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" value="{{$customer->id}}">
        </button>
        
      </div>
      <div class="modal-body">
        <form action="{{ route('customers.destroy', ['id' => $customer->id]) }}" method="POST">
            @csrf
            @method('DELETE')
              <h3>Are You Sure You want to Delete {{$customer->customer_name}}</h3>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-block">Yes</button>
            </div>
        </form>
        </div>
      
    </div>
  </div>
</div>
{{----------End Modal For Delete Section------------------}}
 @endforeach
                    </table>    
              </div>          
          </div>               
      </div>
      </div>


      {{------Modal for Create User-----}}
  <div class="modal right fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Add Customer</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="">Customer Name:</label>
                  <input type="text" name="customer_name" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Address:</label>
                  <input type="text" name="address" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Phone:</label>
                  <input type="text" name="phone" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Email:</label>
                  <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" name="image" class="form-control">
              </div>
            
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block">Save Supplier</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  {{------End Modal for Create User-----}}





  <style>
      .modal.right .modal-dialog {
          position: relative;
          bottom: 10%;
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