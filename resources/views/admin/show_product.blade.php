<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')


   <style type="text/css">

    .center 
    {
      margin: auto;
      width: 80%;
      border: 2px solid white;
      text-align: center;
      margin-top: 40px;
    }

    .font_size
    {
      text-align: center;
      font-size: 40px;
      padding: 20px;
    }

    .img_size
    {
      width: 150px;
      height: 150px;
    }

    .th_color
    {
      background: skyblue;
    }

    .th_deg
    {
      padding: 30px;
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

          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}} 

          </div>

          @endif



          <h2 class="font_size">Xem Sản Phẩm</h2>



          <table class="center">
            <tr class="th_color">
                <th class="th_deg">Tên sản phẩm</th>
                <th class="th_deg">Mô tả </th>
                <th class="th_deg">Giá </th>
                <th class="th_deg">Giảm Giá</th>
                <th class="th_deg"> Số lượng </th>
                <th class="th_deg">Danh mục </th>
                <th class="th_deg">Hình ảnh </th>
                <th class="th_deg">Chức Năng </th>
                
            </tr>

            @foreach($product as $product)

            <tr>
              <td>{{$product->title}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->discount_price}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->catagory}}</td>

              <td>
                <img class="img_size" src="/product/{{$product->image}}" alt="">
              </td>

              <td>
                <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không')" href="{{url('delete_product',$product->id)}}">Xoá</a>
                <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Sửa</a>
              </td>
 

            </tr>

            @endforeach
            






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