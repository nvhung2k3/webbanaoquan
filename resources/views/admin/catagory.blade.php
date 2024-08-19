<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }
    .h2_font
    {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color
    {
        color: black;
    }
    .center 
    {
      margin: auto;
      width: 50%;
      text-align: center;
      margin-top:  30px;
      border: 3px solid white;
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

          
            <div class="div_center">
                <h2 class="h2_font">Danh Mục</h2>
                <form action="{{url('/add_catagory')}}" method="POST">
                    @csrf
                       <input class="input_color" type="text" name="catagory" placeholder="Nhập danh mục"> 
                       <input type="submit" class="btn btn-primary" name="submit" value="Thêm ">
                 </form>
            </div>

            <table class="center">
            <tr>
              <td>Danh mục</td>

            <td>Chức Năng</td>
            </tr>

            @foreach($data as $data)
            <tr>
              <td>{{ $data->catagory_name}}</td>
              <td>
                <a onclick="return confirm('Bạn có chắc muốn xoá danh mục này không')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}"> Xoá</a>
              </td>
            </tr>
            @endforeach
            </table>
       
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>