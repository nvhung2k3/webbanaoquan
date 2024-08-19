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
            text-align: center;
            padding: 30px;

        }
        table,th,td
        {
            border: 1px solid grey;
        }
        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg
        {
            height: 200px;
            width: 200px;
        }
        .total_deg
        {
            font-size: 20px;
            padding: 40px;
        }
   

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
         @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}} 

          </div>

          @endif
    
      <div class="center">
        <table>

        <tr>
            <th class="th_deg">Sản Phẩm</th>
            <th class="th_deg">Số lượng sản phẩn</th>
            <th class="th_deg">Giá</th>
            <th class="th_deg">Hình ảnh</th>
            <th class="th_deg">Chức năng</th>
        </tr>
        <?php $totalprice=0; ?>

        @foreach($cart as $cart)

        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}}VND</td>
            <td><img class="img_deg" src="/product/{{$cart->image}}" alt=""></td>
            <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này không!!!')" href="{{url('remove_cart',$cart->id)}}">Xoá sản phẩm</a></td>
            
        </tr>
        <?php $totalprice=$totalprice + $cart->price ?>
        @endforeach

       


        </table>
        <div>
            <h1 class="total_deg">Tổng số tiền là :  {{$totalprice}} VND</h1>
        </div>



        <div>
            <h1 style="font-size: 25px; padding-bottom: 15px">Thanh toán</h1>
            <a href="{{url('cash_order')}}" class="btn btn-success">Khi giao hàng</a>

            <a href="{{url('stripe',$totalprice)}}" class="btn btn-primary">Bằng thẻ</a>
        
           
            <Form action="{{url('vnpay_payment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{$totalprice}}">
                 <button style="background-color: red   ; margin-top: 1px;" type="submit" name="redirect" class="btn btn-primary">Bằng VNPAY</button>

            </Form>
            <Form action="{{url('/momo_payment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="total_momo" value="{{$totalprice}}">

                    <button style="background-color: blueviolet ; margin-top: 1px;" type="submit" name="payUrl" class="btn btn-info">Bằng MOMO</button>

   

            </Form>

         
            


        </div>

 
      </div>
     


      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>