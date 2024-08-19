<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Session;

use Stripe;

use App\Models\Comment;

use App\Models\Reply;



class HomeController extends Controller
{
    public function index()
    { 
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();

            $product=Product::paginate(3);
            $comment=comment::orderby('id','desc')->get();
            
            return view('home.userpage',compact('product','comment','showgh','showdh'));

        }
        else
        {
            $product=Product::paginate(3);
            $comment=comment::orderby('id','desc')->get();

            $showgh=0;
            $showdh=0;
        
             return view('home.userpage',compact('product','comment','showgh','showdh'));

        }
       
        
        
    }



    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            $tongsp=product::all()->count();

            $tongdh=order::all()->count();

            $tongkh=user::all()->count();

            $order=order::all();

            $tongdt=0;

            foreach( $order as $order)
            {
                $tongdt=$tongdt + $order->price;
            }

            

            $giaohang=order::where('delivery_status','=','Đang giao')->get()->count();

            $dagiao=order::where('delivery_status','=','Đã giao')->get()->count();

            $khinhan=order::where('payment_status','=','Thanh toán khi nhận hàng')->get()->count();

            $bangthe=order::where('payment_status','=','Bằng thẻ')->get()->count();

            $vnpay=order::where('payment_status','=','Bằng VNPAY')->get()->count();

            $momo=order::where('payment_status','=','Bằng MOMO')->get()->count();


            // $sanpham=round(($dagiao/$tongdh*100),2);



        


            return view('admin.home', compact('tongsp','tongdh','tongkh','tongdt','giaohang','dagiao','khinhan','bangthe','vnpay','momo'));
        }
        elseif($usertype=='2')
        {
            return view('admin.home1');
        }
        else{

            if(Auth::id())
            {
                $id=Auth::user()->id;

                $showgh=cart::where('user_id','=',$id)->get()->count();

                $user=Auth::user();
                $userid=$user->id;
                $showdh=order::where('user_id','=',$userid)->get()->count();
    

                $product=Product::paginate(3);

                $comment=comment::all();

               return view('home.userpage',compact('product','comment','showgh','showdh'));
            }
           

            else
            {
                $product=Product::paginate(3);

                $comment=comment::all();

                return view('home.userpage',compact('product','comment',));
            }
        }
    }


    public function product_details($id)
    {
        if(Auth::id())
        {
            $showdh=0;
            $showgh=0;
            

            $product=product::find($id);

            return view('home.product_details',compact('product','showgh','showdh'));

        }
        else
        {
            $showdh=0;
            $showgh=0;
           
            $product=product::find($id);

            return view('home.product_details',compact('product','showdh','showgh'));
        }


    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            
            $userid=$user->id;
    
            $product=product::find($id);

            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;


                if($product->discount_price!=null)
    
                {
                    $cart->price=$product->discount_price * $request->quantity ;
                }
                else
                {
                    $cart->price=$product->price *$cart->quantity;
    
                }

                $cart->save();

                return redirect()->back()->with('message','Đã thêm vào giỏ hàng');

            }
            else
            {
                $cart=new cart;

                $cart->name=$user->name;
    
                $cart->email=$user->email;
    
                $cart->phone=$user->phone;
    
                $cart->address=$user->address;
    
                $cart->user_id=$user->id;
    
                $cart->product_title=$product->title;

                $cart->price=$product->price;
    
              
    
               
    
                $cart->image=$product->image;
    
                $cart->Product_id=$product->id;
    
                $cart->quantity=$request->quantity;
    
                $cart->save();
    
                return redirect()->back()->with('message','Đã thêm vào giỏ hàng');

                

            }

           

        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();

            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();


            return view('home.showcart',compact('cart','showgh','showdh'));

        }
        else
        {
            return redirect('login');
        } 
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
           $user=Auth::user();
 
           $userid=$user->id;

           $data=cart::where('user_id','=',$userid)->get();

           foreach($data as $data)
           {
            $product=product::all();

            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            // $moto= $product->quantity;
            // $product-> quantity= $moto - $data->quantity;

            $order->payment_status='Thanh toán khi nhận hàng';
            $order->delivery_status='Đang giao';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

           }
           return redirect()->back()->with('message','Bạn đã đặt hàng thành công!!!!!.Chúc bạn có một buổi mua sắm  vui vẻ!!!!');

    }

    public function stripe($totalprice)
    {
        $id=Auth::user()->id;
        $showgh=cart::where('user_id','=',$id)->get()->count();

        $user=Auth::user();
        $userid=$user->id;
        $showdh=order::where('user_id','=',$userid)->get()->count();

        return view('home.stripe',compact('totalprice','showgh','showdh'));
    }

    public function stripePost(Request $request,$totalprice)


    {
   
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanh for payment" ]);

                $user=Auth::user();

                $userid=$user->id;
     
                $data=cart::where('user_id','=',$userid)->get();
     
                foreach($data as $data)
                {
     
                 $order=new order;
     
                 $order->name=$data->name;
                 $order->email=$data->email;
                 $order->phone=$data->phone;
                 $order->address=$data->address;
                 $order->user_id=$data->user_id;
     
     
                 $order->product_title=$data->product_title;
                 $order->price=$data->price;
                 $order->quantity=$data->quantity;
                 $order->image=$data->image;
                 $order->product_id=$data->Product_id;
     
                 $order->payment_status='Bằng thẻ';
                 $order->delivery_status='Đang giao';
     
                 $order->save();
     
                 $cart_id=$data->id;
     
                 $cart=cart::find($cart_id);
     
                 $cart->delete();
                }
     
      
        Session::flash('success', 'Thanh toán thành công!!!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            
            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();



            $order=order::where('user_id','=',$userid)->get();

            

            return view('home.order',compact('order','showgh','showdh'));
        }
        else
        {
            return redirect('login');
        }
    }
     
    public function cancel_order($id)
    {
        $order=order::find($id);
        
        $order->delivery_status='Bạn đã hủy đơn hàng';

        $order->save();

        return redirect()->back();

    }
    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment=new comment;

            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;

            $comment->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply= new reply;

            $reply->name=Auth::user()->name;

            $reply->user_id=Auth::user()->id;

            $reply->comment_id=$request->commentId;

            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back();



        }
        else
        {
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();



            $comment=comment::orderby('id','desc')->get();
            $serach_text=$request->search;
    
            $product=product::where('title','LIKE',"%$serach_text%")->orWhere('catagory','LIKE',"$serach_text")
            ->paginate(6);
    
            return view('home.userpage',compact('product','comment','showgh','showdh'));

        }
        else
        {
            $showdh=0;
            $showgh=0;
            $comment=comment::orderby('id','desc')->get();
            $serach_text=$request->search;
    
            $product=product::where('title','LIKE',"%$serach_text%")->orWhere('catagory','LIKE',"$serach_text")
            ->paginate(6);
    
            return view('home.userpage',compact('product','comment','showgh','showdh'));
        }
 


    }
    public function product()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();


            $product=Product::paginate(6);
            $comment=comment::orderby('id','desc')->get();
            return view('home.all_product',compact('comment','product','showgh','showdh'));

        }
        else
        {
            $showgh=0;
            $showdh=0;

            $product=Product::paginate(6);
            $comment=comment::orderby('id','desc')->get();
            return view('home.all_product',compact('comment','product','showgh','showdh'));

        }

    }


    public function search_product(Request $request)
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $showgh=cart::where('user_id','=',$id)->get()->count();

            $user=Auth::user();
            $userid=$user->id;
            $showdh=order::where('user_id','=',$userid)->get()->count();

            
            $comment=comment::orderby('id','desc')->get();
            $serach_text=$request->search;
    
            $product=product::where('title','LIKE',"%$serach_text%")->orWhere('catagory','LIKE',"$serach_text")
            ->paginate(6);
    
            return view('home.all_product',compact('product','comment','showgh','showdh'));
    

        }
        else
        {
            $showdh=0;
            $showgh=0;
            $comment=comment::orderby('id','desc')->get();
            $serach_text=$request->search;
    
            $product=product::where('title','LIKE',"%$serach_text%")->orWhere('catagory','LIKE',"$serach_text")
            ->paginate(6);
    
            return view('home.all_product',compact('product','comment','showgh','showdh'));
    
        }


    }

    // thanh toán vnpay

    public function vnpay_payment(Request $request)
    {
        $data = $request ->all();
        $code_cart = rand(00,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/camon";
        $vnp_TmnCode = "IRK960Q9";//Mã website tại VNPAY 
        $vnp_HashSecret = "VAJAXEIWJIAQNMTQZGDRNPIUZRJUYYGZ"; //Chuỗi bí mật

        $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo ='Thanh toan don hang test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
//Billing

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }

   

    }

    public function camon()
{
    $user=Auth::user();

    $userid=$user->id;

    $data=cart::where('user_id','=',$userid)->get();

    foreach($data as $data)
    {

     $order=new order;

     $order->name=$data->name;
     $order->email=$data->email;
     $order->phone=$data->phone;
     $order->address=$data->address;
     $order->user_id=$data->user_id;


     $order->product_title=$data->product_title;
     $order->price=$data->price;
     $order->quantity=$data->quantity;
     $order->image=$data->image;
     $order->product_id=$data->Product_id;

     $order->payment_status='Bằng VNPAY';
     $order->delivery_status='Đang giao';

     $order->save();

     $cart_id=$data->id;

     $cart=cart::find($cart_id);

     $cart->delete();
    }

 return redirect()->back()->with('message','Bạn đã đặt hàng thành công!!!!!.Chúc bạn có một buổi mua sắm  vui vẻ!!!!');
}


    // Thanh toán bằng momo

   public function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

    public function momo_payment(Request $request)
    {
   


        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";



        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/camon1";
        $ipnUrl = "http://127.0.0.1:8000/camon1";
        $extraData = "";
        
        

            $requestId = time() . "";
            $requestType = "payWithATM";
         
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            // dd($signature);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this-> execPostRequest($endpoint, json_encode($data));

            $jsonResult = json_decode($result, true);  // decode json
        
            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);

    }
    public function camon1()
{
    $user=Auth::user();

    $userid=$user->id;

    $data=cart::where('user_id','=',$userid)->get();

    foreach($data as $data)
    {

     $order=new order;

     $order->name=$data->name;
     $order->email=$data->email;
     $order->phone=$data->phone;
     $order->address=$data->address;
     $order->user_id=$data->user_id;


     $order->product_title=$data->product_title;
     $order->price=$data->price;
     $order->quantity=$data->quantity;
     $order->image=$data->image;
     $order->product_id=$data->Product_id;

     $order->payment_status='Bằng MOMO';
     $order->delivery_status='Đang giao';

     $order->save();

     $cart_id=$data->id;

     $cart=cart::find($cart_id);

     $cart->delete();
    }

 return redirect()->back()->with('message','Bạn đã đặt hàng thành công!!!!!.Chúc bạn có một buổi mua sắm  vui vẻ!!!!');
}
}


    


   

