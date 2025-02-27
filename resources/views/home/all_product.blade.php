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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->

      <div style="text-align: center; padding-bottom: 30px;">

      <h1>Bình luận</h1>

      <form action="{{url('add_comment')}}" method="POST">
         @csrf
         <textarea style="height: 150px; width:600px" placeholder="Nhập bình luận" name="comment"></textarea>
         <br>
         <input type="submit" class="btn btn-primary" value="Gửi" name="" id="">
      </form>
      </div>


      <div style="padding-left: 20%;">
         <h1 style="font-size: 20px; padding-bottom:20px;" >Tất cả các bình luận</h1>

       @foreach($comment as $comment)

         <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>

            <!-- <a href="javascript::void(0);" onclick="reply(this)" data-commentId="{{($comment->id)}}">reply</a> -->
      </div>

      @endforeach
      
      


      <div style="display: none;" class="hello">

      <form action="{{url('add_reply')}}" method="POST">

         <input type="text" id="commentId" name="commentId" hidden>
         <textarea style="height:100px; width:500px;" name="reply" placeholder="Nhập bình luận"></textarea>
         <br>

         <button type="submit"class="btn btn-warning">reply</button>
         <a href="javascript::void(0);" class="btn btn-primary" onclick="reply_close(this)">close</a>
        

         </form>

      </div>


      </div>

     <br><br>
      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-commentId')
            $('hello').insertAfter($(caller));
            $('.hello').show();

         }
         function reply_close(caller)
         {
            
            $('.hello').hide();

         }
       
         
      </script>

<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
 
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