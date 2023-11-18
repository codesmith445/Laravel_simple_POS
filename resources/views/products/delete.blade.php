<div class="modal right fade" id="deleteProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLongTitle">Delete Product</h4>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <input type="hidden" value="{{$product->id}}">
         </button>
         
       </div>
       <div class="modal-body">
         <form action="{{ route('products.destroy', $product->id) }}" method="POST">
             @csrf
             @method('DELETE')
               <h3>Are You Sure You want to Delete {{$product->product_name}}</h3>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-danger btn-block">Yes</button>
             </div>
         </form>
        </div>
       
     </div>
   </div>
 </div> 