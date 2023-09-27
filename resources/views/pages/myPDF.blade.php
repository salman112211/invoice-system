<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>

<body>
    @foreach($verifications as $verification)
   
<img class="top-logo" src="img/psl.png" width="100px"/></img>
<h1 style="text-align:center;">{{ $title }}</h1>
<img src="img/Baar.png" class="bar"/></img>
            <div class="tm_invoice_info_list">
                
                <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">{{ $verification->id }}</b></p>
                <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color">{{ $verification->invoice_date }}</b></p>
                <p class="tm_invoice_date tm_m0"> <b class="tm_primary_color"></b></p>
            </div>

            <div class="tm_invoice_info">
            <h4>Inovice To</h4>
                <p class="tm_invoice_date tm_m0">Email: <b class="tm_primary_color">{{ $verification->email }}</b></p>
                <p class="tm_invoice_date tm_m0">Phone: <b class="tm_primary_color">{{ $verification->phone }}</b></p>
                <p class="tm_invoice_date tm_m0">Address: <b class="tm_primary_color">{{ $verification->address }}</b></p>
                <p class="tm_invoice_date tm_m0"> <b class="tm_primary_color"></b></p>
            </div>
        
 


    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Item</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Price</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Qty</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Total</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Vat</th>
                <!-- <th style="border: 1px solid #ccc; padding: 10px; text-align: center;">Sub Total</th> -->
            </tr>
        </thead>
        <tbody>
            @php
                // Decode the JSON dynamic data
                $dynamicData = json_decode($verification->dynamic_data);
            @endphp
            @foreach($dynamicData as $data)
                <tr>
                    <!-- @if ($loop->first)
                        <td rowspan="{{ count($dynamicData) }}">{{ $verification->status }}</td>
                    @endif -->
                    <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">{{ $data->status }}</td>
                    <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">£ {{ $data->price }}</td>
                    <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">{{ $data->quantity }}</td>
                    <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">£ {{ $data->total_price }}</td>
                    <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">£ {{ $data->vat }}</td>
                    <!-- <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">{{ $data->subtotal }}</td> -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tbody>
                <tr>
                    <td style="text-align: right; width: 70%; font-weight: bold;">Sub Total</td>
                    <td style="text-align: center; font-weight: bold;">£ {{ $verification->total }}</td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 70%; font-weight: bold;">VAT(20%)</td>
                    
                
                    <td style="text-align: center; font-weight: bold;">£ {{ $verification->vat }}</td>
                    
                </tr>
                <hr class="grand-t">
                <tr>
                    <td style="text-align: right; width: 70%; font-size: 16px; font-weight: bold;">Grand Total</td>
                    <td style="text-align: center; font-size: 16px; font-weight: bold;">£ {{ $verification->grand_total }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="static-text">
        <p><b>VAT No: xxx xxxx xx</b></p>
        <p>Bank Name - ABC UK<br>Account Name - Triplur<br>Sort Code: xx-xx-xx<br>Account Number: xxxxxxxx</p>
    </div>

   

    <div style="margin-top: 20px;">
        <hr style="color:#fff;">
        <p><b>Terms & Conditions:</b></p>
        <ul>
            <li>To access our terms and conditions, kindly visit our website and navigate to the "Terms and Conditions" section.</li>
        </ul>
    </div>

    <p style="margin-top: 30px; text-align: center;">
        <b class="tm_primary_color" style="font-size: 16px;">Triplur</b><br>
        <b>Registered No:</b> 12172129<br>
        Triplur, Unit C1, Twickenham Trading Estate, Twickenham, TW1 1DQ London, UK<br>
        <b>Phone:</b> +44 20 3355 3214
    </p>
    @endforeach
</body>
</html>



<style>
    body {
    background-image: url('img/inv-bg.jpg');
    background-size: cover; /* Adjust as needed */
    background-repeat: no-repeat; /* Adjust as needed */
    /* You can add more background properties here */
    
}
.bar{
    width:1000px;
    height: 5px;
    position: relative;
    right: 10%;
}
.top-logo {
position: relative;
left:42%;
  }

.grand-t{
    width:50%;
   position: relative;
   left:55%;
   color:#fff;
}

.static-text{
    margin-top:-200px;
}

.tm_invoice_info_list{
    width:50%;
   position: relative;
   left:80%;
}

.tm_invoice_info{
    margin-top:-200px;
}



</style>