<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">

    .title_deg
    {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }
    .table_deg
    {
      
      width: 100%;
      margin: auto;
    
      text-align: center;
    }
    .th_deg
    {
      background-color: skyblue;
    }
    .img_size
    {
      width: 200px;
      height: 100px;
 
    }


   </style>



  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar1')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">

          <h1 class="title_deg">Đơn Hàng</h1>


          <div style=" padding-bottom: 30px">
            <form action="{{url('search')}}" method="get">
              @csrf
              <input type="text" style="color: black;" name="search" placeholder="Nhập sản phẩm cầm tìm...">
              <input type="submit" value="Tìm kiếm" class="btn btn-success">
            </form>
          </div>

          <table class="table_deg">


          <tr class="th_deg">
            <th style="padding: 20px;">Tên KH</th>
            <th style="padding: 20px;">Email</th>
            <th style="padding: 20px;">Địa chỉ</th>
            <th style="padding: 20px;">Điện thoại</th>
            <th style="padding: 20px;">Tên sản phẩm</th>
            <th style="padding: 20px;">Số lượng</th>
            <th style="padding: 20px;">Giá</th>
            <th style="padding: 20px;">Cách thanh toán</th>
            <th style="padding: 20px;">Tình trạng giao hàng</th>
            <th style="padding: 20px;">Ảnh</th>
            <th style="padding: 20px;">Tình trang đơn hàng</th>

            <th style="padding: 10px;">Print PDF</th>



          </tr>
          @forelse($order as $order)
          <tr >
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->product_title}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->price}}VND</td>
            <td>{{$order->payment_status}}</td>
            <td>
            @if($order->delivery_status=='Bạn đã hủy đơn hàng')
            <p style="font-size: 16px ;">khách hàng đã hủy đơn hàng</p>
            @else
            {{$order->delivery_status}}
            @endif
            </td>

            <td>
              <img class="img_size" src="/product/{{$order->image}}" alt="">
            </td>
            <td>
              @if($order->delivery_status=='Đang giao')
              <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Bạn đã giao hàng thành công đúng không!!!')" class="btn btn-success">Giao hàng</a>

              @elseif($order->delivery_status=='Bạn đã hủy đơn hàng')
             <p style="color: red;">Không thể giao</p>
            
             @else
             <p style="color: green;">Đã Giao hàng</p>

            @endif

            </td>
            <td>
              <a href="{{url('print_pdf',$order->id)}}" class="btn btn-primary    ">In PDF</a>
            </td>
            
          </tr>


          @empty

          <div>
            <tr>
              <td colspan="16">
                Không tìm thấy sản phẩm
              </td>
            </tr>

          @endforelse
          </table>
            

 
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>