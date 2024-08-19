<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">

   @include('admin.css')
   <style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }
    .fort_size
    {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .text_color
    {
        color: black;
        padding-bottom: 20px;
    }

    label
    {
        display: inline-block;
        width: 200px;
    }
    .div_design
    {
        padding-bottom: 15px;
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
            <h1 class="fort_size">Sửa sản phẩm</h1>

            <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="div_design">
            <label  >Tên sản phẩm</label>
            <input class="text_color" type="text" name="title" placeholder="Nhập tên" required="" value="{{$product->title}}">
            </div>

            <div class="div_design">
            <label >Mô tả sản phẩm</label>
            <input class="text_color" type="text" name="description" placeholder="Nhập mô tả" required=""  value="{{$product->description}}">
            </div>

            <div class="div_design">
            <label >Giá sản phẩm</label>
            <input class="text_color" type="number" name="price" placeholder="Nhập giá" required=""  value="{{$product->price}}">
            </div>

            <div class="div_design">
            <label >Giảm giá</label>
            <input class="text_color" type="number" name="dis_price" placeholder="Nhập số tiền giảm giá"  value="{{$product->discount_price}}">
            </div>
            
            <div class="div_design">
            <label >Số lượng sản phẩm</label>
            <input class="text_color" type="number" min="0"  name="quantity" placeholder="Nhập số lượng" required=""  value="{{$product->quantity}}">
            </div>



            <div class="div_design">
            <label >Danh mục sản phẩm</label>
            <select class="text_color" name="catagory" required=""  >
                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>


                @foreach($catagory as $catagory)
                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                @endforeach
                
            </select>
            </div>


            <div class="div_design">
            <label >Hình ảnh sản phẩm</label>
            <img style="margin: auto;" height="100" width="100"    src="/product/{{$product->image}}" >
            
            </div>




            <div class="div_design">
            <label >Hình ảnh sản phẩm</label>
            <input type="file" name="image" >
            
            </div>

            <div class="div_design">
           
            <input type="submit" value="Sửa" class="btn btn-primary" >
            
            </div>
            </form >
            


          </div>
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