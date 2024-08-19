<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Order details</h1>

    Tên khách hàng:<h3>{{$order->name}}</h3>
    Gmail khách hàng:<h3>{{$order->email}}</h3>
    SDT khách hàng:<h3>{{$order->phone}}</h3>
    Nơi ở:<h3>{{$order->address}}</h3>
    Id tài khoản:<h3>{{$order->user_id}}</h3>
    Sản phẩm:<h3>{{$order->product_title}}</h3>
    Giá:<h3>{{$order->price}}</h3>
    Số lượng:<h3>{{$order->quantity}}</h3>
    Cách bằng:<h3>{{$order->payment_status}}</h3>
    Id sản phẩm:<h3>{{$order->product_id}}</h3>
    <br><br>
    <img height="250" width="450" src="product/{{$order->image}}" alt="">


    
</body>
</html>