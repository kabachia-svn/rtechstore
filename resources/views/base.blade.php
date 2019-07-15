<!DOCTYPE html>
<html lang='en'>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTech Online Shop</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('headquarters.index') }}">Headquarters</a></li>
            <li><a href="{{ route('branches.index') }}">Branches</a></li>
            <li><a href="{{ route('orders.index') }}">Orders</a></li>
            <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('deliveries.index') }}">Deliveries</a></li>
            <li><a href="{{ route('orderdetails.index') }}">Order Details</a></li>
        </ul>
    </div>
    <div class="container">
        @yield('main')
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
