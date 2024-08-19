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

          <h1 class="title_deg">Trang này không thuộc quền hạn của bạn!!!!!</h1>      
 
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