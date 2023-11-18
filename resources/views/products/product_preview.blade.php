
<div class="modal right fade" id="productPreview{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="staticBackdroplabel">{{$product->product_name}}</h4>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <input type="hidden" value="{{$product->id}}">
         </button>
         
       </div>
       <div class="modal-body">
        <div class="">
        <img src="{{ asset('products/images/' . $product->product_image) }}" width="290" height="200" style="cursor:pointer;" alt="">
        </div>
        <img src="{{ asset('products/barcodes/' . $product->barcode) }}" width="290" style="cursor:pointer;" alt="">
        </div>
       
     </div>
   </div>
 </div> 