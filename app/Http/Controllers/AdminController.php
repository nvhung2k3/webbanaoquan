<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Catagory;

use App\Models\Product;

use App\Models\Order;

use App\Models\User;

use Symfony\Component\Routing\Matcher\RedirectableUrlMatcherInterface;

use PDF;

class AdminController extends Controller
{


    public function view_catagory()
    {
        $data=Catagory::all();
        return view('admin.catagory',compact('data'));
    }
    public function add_catagory(Request $request)
    {
        $data=new catagory;

        $data->catagory_name=$request->catagory;

        $data->save();
        return redirect()->back()->with('message','Thêm Thành Công!!!');

    }


    
        public function delete_catagory($id)
        {
            $data=catagory::find($id);
            $data->delete();
            return redirect()->back()->with('message','Xoá Thành Công');

        }





        public function view_product()
        {
            $catagory=catagory::all();
            return view('admin.product',compact('catagory'));
        }




        public function add_product(Request $request)
        {
            $product=new product;
            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->quantity=$request->quantity;
            $product->discount_price=$request->dis_price;
            $product->catagory=$request->catagory;
            
            $image=$request->image;
            
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);

            $product->image=$imagename;

            $product->save();

            return redirect()->back()->with('message','Thêm thành công!!!');

        }



        public function show_product()
        {
            // paginate(3)
            $product=product::all();
            return view('admin.show_product', compact('product'));
        }       



        public function delete_product($id)
        {
            $product=product::find($id);

            $product->delete();

            return redirect()->back()->with('message','Xoá thành công!!');
        }




        public function update_product($id)
        {
            $product=product::find($id);
            $catagory=catagory::all();


            return view('admin.update_product',compact('product','catagory'));
        }



        public function update_product_confirm(Request $request,$id)
        {
            $product=product::find($id);


            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $product->catagory=$request->catagory;
            $product->quantity=$request->quantity;
            $image=$request->image;

            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);

            $product->image=$imagename;

            }
            
           

            $product->save();

            return redirect()->back()->with('message','Sửa thành công!!!');

        }

        public function order()
        {
            $order=order::all();
            $usertype=Auth::user()->usertype;

            if($usertype='1')
            {
                return view('admin.order',compact('order'));
            }
            else
            {
                return view('admin.order1',compact('order'));

            }

            
        }

        public function delivered($id)
        {
            $order=order::find($id);
            $order->delivery_status="Đã Giao";
            $order->save();
            return redirect()->back();
        }

        public function print_pdf($id)
        {
            $order=order::find($id);

            $pdf=PDF::loadView('admin.pdf',compact('order'));

            return $pdf->download('order_details.pdf');



        }

        public function searchdata(Request $request)
        {
            $searchText=$request->search;
            $order=order::where('name','LIKE',"%$searchText%")
            ->orWhere('phone','LIKE',"%$searchText%")
            ->orWhere('product_title','LIKE',"%$searchText%")
            ->orWhere('address','LIKE',"%$searchText%")
            ->orWhere('delivery_status','LIKE',"%$searchText%")
            ->orWhere('payment_status','LIKE',"%$searchText%")
            ->get();

            return view('admin.order',compact('order'));

        }

        public function user()
        {
            $user=user::all();

            
            return view('admin.user',compact('user'));
        }

        public function user1()
        {
            return view('admin.user1');
        }

        
        public function boss($id)
        {
            $user=user::find($id);
            $user->usertype='1';
            $user->save();
            return redirect()->back();
        }
        public function nhanvien($id)
        {
            $user=user::find($id);
            $user->usertype='2';
            $user->save();
            return redirect()->back();
        }
        public function khachhang($id)
        {
            $user=user::find($id);
            $user->usertype='0';
            $user->save();
            return redirect()->back();
        }


    
}
