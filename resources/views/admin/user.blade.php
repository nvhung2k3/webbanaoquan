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
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">

          <h1 class="title_deg">User</h1>


        

          <table class="table_deg">


          <tr class="th_deg">
     
            <th style="padding: 20px;">Tên </th>
            <th style="padding: 20px;">Email</th>
            <th style="padding: 20px;">Địa chỉ</th>
            <th style="padding: 20px;">Điện thoại</th>
            <th style="padding: 20px;">Chức vụ</th>
            <th style="padding: 20px;">Chức năng</th>

        </tr>

        @foreach($user as $user)
        <tr>
           
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>
              @if($user->usertype== 1)
              <p style="font-size: 16px ;">ADMIN</p>
              @elseif($user->usertype== 2)
              <p style="font-size: 16px ;">Nhân Viên</p>
              @else
              <p style="font-size: 16px ;">Khách Hàng</p>

              @endif
            </td>
            <td>
            <a href="{{url('boss',$user->id)}}" onclick="return confirm('Bạn có chắc không!!!')" class="btn btn-success">Admin</a>
            <a href="{{url('nhanvien',$user->id)}}" onclick="return confirm('Bạn có chắc không!!!')" class="btn btn-success">Nhân Viên</a>
            <a href="{{url('khachhang',$user->id)}}" onclick="return confirm('Bạn Bạn có chắc không!!!')" class="btn btn-success">Khách Hàng</a>
            </td>
        </tr>
        @endforeach
           



          
            

 
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