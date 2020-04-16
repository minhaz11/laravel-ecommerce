<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('Invoice')}}/style.css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('Invoice')}}/logo.jpg">
      </div>
      <div id="company">
        <h2 class="name">Fashe Footwear</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="support@fashe.com">support@fashe.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$orderDetails->customers->name.' '.$orderDetails->customers->last_name}}</h2>
          <div class="address">{{$orderDetails->customers->address}}</div>
          <div class="email"><a href="mailto:john@example.com">{{$orderDetails->customers->email}}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{$orderDetails->id}}</h1>
          <div class="date">Date of Invoice: {{\Carbon\Carbon::parse($orderDetails->created_at)->format('d/m/Y')}} </div>
          {{-- <div class="date">Due Date: 30/06/2014</div> --}}
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">PRODUCT NAME</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productInfo as $key => $item)
            <tr>
            <td class="no">{{$loop->index+1}}</td>
            <td class="desc"><h3>{{$item->product_name}}</h3></td>
                <td class="unit">${{$item->product_price}}</td>
            <td class="qty">{{$item->product_quantity}}</td>
            <td class="total">${{$item->product_price*$item->product_quantity}}</td>
              </tr>
            @endforeach


        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>${{$orderDetails->total_price}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 0%</td>
            <td>${{$orderDetails->total_price}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>${{$orderDetails->total_price}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Tax bill of 5% will included sooner.</div>
      </div> <br> <br>
      <div id="notices">
        <div>Signature:</div>
        <div class="notice" style="margin-bottom:15px; margin-top:15px">-------------------------</div>
        <div class="notice">Date:-----------------</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is not valid without the signature and seal.
    </footer>
  </body>
</html>
