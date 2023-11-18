@extends('layouts.app')
@section('content')        
   <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   </head>
    <div class="container-fluid">
     @livewire('order')
{{---------This is for Print--------------}}

<div class="modal">
    <div id="print">
        @include('reports.receipt')
       </div>
      
      
    </div>
 
      


 <style>
     
    .modal.right .modal-dialog {
        position: relative;
        bottom: 5%;
        right: 0;
        margin-right: 0;
    }
     .radio-item input[type="radio"]{
         visibility: hidden;
         width: 20px;
         height: 20px;
         margin-top: 20px;
         padding: 0;
         cursor: pointer;
   }
    
   .radio-item input[type="radio"] {
    position: relative;
    visibility: visible;
   }
 </style>
@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add_more').on('click', function() {
            var productOptions = $('.product_id').html();
            var numberOfRows = $('.addMoreProduct tr').length + 1;
            var newRow = `
                <tr>
                    <td class="no">${numberOfRows}</td>
                    <td>
                        <select class="form-control product_id" name="product_id[]">
                            ${productOptions}
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control quantity"></td>
                    <td><input type="number" name="price[]" class="form-control price"></td>
                    <td><input type="number" name="discount[]" class="form-control discount"></td>
                    <td><input type="number" name="total_amount[]" class="form-control total_amount"></td>
                    <td>
                        <a class="btn btn-danger btn-sm delete rounded-circle">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </td>
                </tr>`;
            $('.addMoreProduct').append(newRow);
        });

        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        });

        function calculateTotal() {
        var total = 0;
        $('.total_amount').each(function() {
            total += parseFloat($(this).val() || 0);
        });
        $('.total').text(total.toFixed(2));
    }

    $(document).on('change', '.product_id', function() {
        var tr = $(this).closest('tr');
        var selectedOption = $(this).find('option:selected');
        var price = parseFloat(selectedOption.attr('data-price'));
        var quantity = parseFloat(tr.find('.quantity').val() || 0);
        var discount = parseFloat(tr.find('.discount').val() || 0);
        var totalAmount = (quantity * price) - ((quantity * price * discount) / 100);
        tr.find('.price').val(price);
        tr.find('.total_amount').val(totalAmount.toFixed(2));
        calculateTotal();
    });

    $(document).on('input', '.quantity, .discount', function() {
        var tr = $(this).closest('tr');
        var price = parseFloat(tr.find('.price').val() || 0);
        var quantity = parseFloat(tr.find('.quantity').val() || 0);
        var discount = parseFloat(tr.find('.discount').val() || 0);
        var totalAmount = (quantity * price) - ((quantity * price * discount) / 100);
        tr.find('.total_amount').val(totalAmount.toFixed(2));
        calculateTotal();
    });
     
    $('.paid_amount').keyup(function() {
        var total = $('.total').html();
        var paid_amount = $(this).val();
        var tot = paid_amount - total;
        $('#balance').val(tot).toFixed(2);
    });

    });
    
   
        function PrintReceiptContent(el) {
        var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block; width: 100%; border: none; background-color: #008b8b; color: #fff; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Print Receipt" onClick="window.print()">';
        data += document.getElementById(el).innerHTML;
        myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
        myReceipt.ScreenX = 0;
        myReceipt.ScreenY = 0;
        myReceipt.document.write(data);
        myReceipt.document.title = "Print Receipt";
        myReceipt.focus();
        setTimeout(() => {
            myReceipt.close();
        }, 800000);
        
   }
    
    
</script>



@endsection
