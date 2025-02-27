<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">

        .center
        {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }
        table,th,td
        {
            border: 1px solid black;
        }
        .th_deg
        {
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
        }

      </style>
   </head>
   <body>

         @include('home.header')

         <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Tên sản phảm</th>
                    <th class="th_deg">Số lượng</th>
                    <th class="th_deg">Giá</th>
                    <th class="th_deg">Tình trang thanh toán </th>
                    <th class="th_deg">Tình trạng giao hàng</th>
                    <th class="th_deg">Ảnh</th>
                    <th class="th_deg">Hủy đơn hàng</th>

                </tr>
                @foreach($order as $order)

                <tr>
                   <td>{{$order->product_title}}</td>
                   <td>{{$order->quantity}}</td>
                   <td>{{$order->price}}VND</td>
                   <td>{{$order->payment_status}}</td>
                   <td>{{$order->delivery_status}}</td>

                   <td>
                    <img src="product/{{$order->image}}" height="100" width="180" alt="">
                   </td>
                   <td>
                    @if($order->delivery_status=='Đang giao')
                    <a onclick="return confirm('Bạn có chắc hủy đơn hàng này không!')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Hủy đơn hàng</a>
                    @else
                    <p style="color: blue;">Không được phép hủy</p>

                    @endif
                   </td>
                </tr>

                @endforeach
            </table>
         </div>
   
        
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>