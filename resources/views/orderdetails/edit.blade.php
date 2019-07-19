@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update order details</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('orderdetails.update', $order_detail->order_detail_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="order_detail_id">Order Detail Id:</label>
                <input type="text" class="form-control" name="order_detail_id" value={{ $order_detail->order_detail_id}} />
            </div>
            <div class="form-group">
                <label for="product_id">Product ID:</label>
               <select class="form-control" name="product_id">
                   <option value={{$order_detail->product_id}}>{{$order_detail->product_id}}</option>
                   @foreach($products as $product)
                       <option value="{{ $product->product_id}}">{{ $product->name}}</option>
                   @endforeach
               </select>
            </div>            
            <div class="form-group">
                <label for="order_id">Order ID:</label>
                <select class="form-control" name="order_id">
                   <option value={{$order_detail->order_id}}>{{$order_detail->order_id}}</option>
                   @foreach($orders as $order)
                       <option value="{{ $order->order_id}}">{{ $order->order_id}}</option>
                   @endforeach
                </select>
            </div> 
            <div class="form-group">
                <label for="product_quantity">Quantity:</label>
                <input type="text" class="form-control" name="product_quantity" value={{ $order_detail->product_quantity}} />
            </div>
            <div class="form-group">
                <label for="delivery_id">Delivery ID:</label>
                <select class="form-control" name="delivery_id">
                   @if(!empty($order_detail->delivery_id))   
                       <option value={{$order_detail->delivery_id}}>{{$order_detail->delivery_id}}</option>
                   @else
                       <option></option>
                   @endif
                   @foreach($deliveries as $delivery)
                       <option value="{{ $delivery->delivery_id}}">{{ $delivery->delivery_id}}</option>
                   @endforeach
                </select>
            </div>           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
