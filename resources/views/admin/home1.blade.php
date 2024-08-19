<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar1')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        @include('admin.body1')
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