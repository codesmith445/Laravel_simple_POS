
<div id="invoice-POS">

        <div id="printed-content">
            <center id="top">
              <div class="logo">Laravel</div>
              <div class="info"></div>
              <h3>Laravel POS System</h3>
            </center>
      </div>
  
      <div id="mid">
          <div class="info">
              <h3>Contact Us</h3>
              <p>
                  Address :  Labangon Cebu City, Philippines 6000
                  Email : dark4ken@gmail.com
                  Phone : 0945 550 6429
              </p>
          </div>
      </div>
  
      <div id="bot">
          <div id="table">
              <table>
                  <tr class="tabletitle">
                      <td class="item"><h3>Item</h3></td>
                      <td class="hours"><h3>Unit</h3></td>
                      <td class="rate"><h3>Qty</h3></td>
                      <td class="rate"><h3>Discount</h3></td>
                      <td class="rate"><h3>Sub Total</h3></td>
                  </tr>
                  @foreach($order_receipt as $receipt)
                  <tr class="service">
                      <td class="tableitem"><p class="itemtex">{{ $receipt->product->product_name }}</p></td>
                      <td class="tableitem"><p class="itemtex">{{ number_format($receipt->price, 2) }}</p></td>
                      <td class="tableitem"><p class="itemtex">{{ $receipt->quantity }}</p></td>
                      <td class="tableitem"><p class="itemtex">{{ $receipt->discount ?? '0' }}</p></td>
                      <td class="tableitem"><p class="itemtex">{{ number_format($receipt->total_amount, 2) }}</p></td>
                  </tr>
                  
                  <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="rate"><p class="itemtex">Tax</p></td>
                    <td class="payment"><p class="itemtex">Sum Total $ {{ number_format($receipt->total_amount, 2) }}</p></td>
                  </tr>
                  @endforeach
                  <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="rate"> Total Amount</td>
                    <td class="payment"><h2>Sum Total $ {{ number_format($order_receipt->sum('total_amount'), 2) }}</h2></td>
                  </tr>
              </table>

              <div class="legal-copy">
                <p class="legal"><strong>**Thank You for Visiting Us**</strong> <br>
                    The goods are subject to tax, prices includes tax
                </p>
              </div>
              <div class="serial-number">
                 Serial Number: <span class="serial">122341213454654646</span> 
                 <span>08/19/2023 &nbsp; &nbsp; 00: 30</span>
              </div>
          </div>
      </div>

    </div>

    <style>
          #invoice-POS {
             box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
             padding: 0mm;
             margin: 0 auto;
             width: 58mm;
             background-color: #fff;

          }

          #invoice-POS::selection {
            background-color: #5d28d7;
            color: #fff;
          }
          
          #invoice-POS ::-moz-selection {
            background-color: #5d28d7;
            color: #fff;
          }
          
          #invoice-POS h3 {
            font-size: 1.5em;
            color: #222;
          }

          #invoice-POS p {
            font-size: 0.7em;
            line-height: 1.2em;
            color: #666;
          }
          
          #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
             border-bottom: 1px solid #eee;
          }

          #invoice-POS #top {
            min-height: 100px;
          }

          #invoice-POS #mid {
            min-height: 80px;
          }

          #invoice-POS #bot {
            min-height: 50px;
          }


          #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
            background-image: url() no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
          }

          #invoice-POS #top .info {
            display: block;
            margin-left: 0;
            text-align: center;
          }

          #invoice-POS .title {
            float: right;
          }

          #invoice-POS .title p{
            text-align: right;
          }

          #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
          }

          #invoice-POS .tabletitle {
            font-size: 0.5em;
            background-color: #eee;
          }
          
          #invoice-POS .service {
            border-bottom: 1px solid #eee;
          }

          #invoice-POS .item {
            width: 24mm;

          }

          #invoice-POS .itemtext {
            font-size: 0.5em;
          }

          #invoice-POS .legal-copy {
            margin-top: 5mm;
            text-align: center;
          }

          .serial-number {
            margin-top: 5mm;
            margin-bottom: 2mm;
            text-align: center;
            font-size: 12px;
          }

          .serial {
            font-size: 10px !important;
          }
    </style>
