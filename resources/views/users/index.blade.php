@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
           <div class="card">
                <div class="card-header"><h4 style="float: left;">Add New User</h4><a href="" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i>Add New User</a></div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      @foreach($users as $key => $user)
                      <tbody>
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>@if($user->is_admin == 1) Admin
                              @else Cashier
                              @endif
                            </th>
                            <td>
                              <div class="btn-group">
                              <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}"><i class="fa fa-edit"></i>Edit</a>
                              <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}"><i class="fa fa-trash"></i>Delete</a>
                              </div>
                            </td>
                        </tr>
                        
                      </tbody>

                      {{---Modal For Edit User---}}
  
  <div class="modal right fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLongTitle">Edit User</h4>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <input type="hidden" value="{{$user->id}}">
         </button>
         
       </div>
       <div class="modal-body">
         <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="">Name:</label>
                 <input type="text" value="{{$user->name}}" name="name" class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Email:</label>
                 <input type="email" value="{{$user->email}}" name="email" class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Phone:</label>
                 <input type="text" value="{{$user->phone}}" name="phone" class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Password:</label>
                 <input type="password" readonly value="{{$user->password}}" name="password" class="form-control">
             </div>
            <!-- <div class="form-group">
                 <label for="">Confirm Password:</label>
                 <input type="password" value="{{$user->password}}" name="confirm_password" class="form-control">
             </div> -->
             <div class="form-group">
                 <label for="">Role:</label>
                 <select name="is_admin" class="form-control">
                     <option value="1" @if($user->is_admin == 1)
                      selected @endif>Admin</option>
                     <option value="2" @if($user->is_admin == 2)
                      selected @endif>Cashier</option>
                 </select>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary btn-block">Update User</button>
             </div>
         </form>
        </div>
       
     </div>
   </div>
 </div>

  {{-------Modal For Delete Button--------}}
     
  <div class="modal right fade" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLongTitle">Delete User</h4>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <input type="hidden" value="{{$user->id}}">
         </button>
         
       </div>
       <div class="modal-body">
         <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
             @csrf
             @method('DELETE')
               <h3>Are You Sure You want to Delete {{$user->name}}</h3>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-danger btn-block">Yes</button>
             </div>
         </form>
        </div>
       
     </div>
   </div>
 </div>
  {{-------End Modal For Delete Button--------}}
    
  {{---End Modal For Edit User---}}
  
                      @endforeach

                    </table>
                </div>
            </div>
           </div>
           <div class="col-md-3">
           <div class="card">
                <div class="card-header"><h4>Search User</h4></div>
                <div class="card-body">
                    
                </div>
            </div>
           </div>
        </div>
    </div>
 </div>

{{------Modal for Create User-----}}
 <div class="modal right fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Add User</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone:</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Role:</label>
                <select name="is_admin" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Cashier</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Save User</button>
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