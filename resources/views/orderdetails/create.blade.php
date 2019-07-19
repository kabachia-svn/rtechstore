@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add order details</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
             @endif
             <form method="post" action="{{ route('orderdetails.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="order_detail_id">Order Detail ID: </label>
                     <input type="text" class="form-control" name="order_detail_id"/>
                 </div>
                 <div class="form-group">
                     <label for="order_id">Order ID:</label>
                     <select class="form-control" name="order_id">
                        @foreach($orders as $order)
                            <option value="{{ $order->order_id}}">{{ $order->order_id}}</option>
                        @endforeach
                     </select>
                  </div>
                 <div class="form-group">
                     <label for="product_id">Product: </label>
                     <select class="form-control" name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->product_id}}">{{ $product->name}}</option>
                        @endforeach
                     </select>
                 </div>
                 <div class="form-group">
                     <label for="product_quantity">Quantity:</label>
                     <input type="text" class="form-control" name="product_quantity"/>
                 </div>
                 <div class="form-group">
                     <label for="delivery_id">Delivery ID:</label>
                     <select class="form-control" name="delivery_id">
                        <option></option>
                        @foreach($deliveries as $delivery)
                            <option value="{{ $delivery->delivery_id}}">{{ $delivery->delivery_id}}</option>
                        @endforeach
                     </select>
                  </div>

                 <button type='submit' class='btn btn-primary-outline'>Add order detail</button>
             </form>
        </div>
    </div> 
</div>
@endsection
