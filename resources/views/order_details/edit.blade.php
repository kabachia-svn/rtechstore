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
        <form method="post" action="{{ route('order_details.update', $order_detail->order_detail_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="order_detail_id">Order Detail Id:</label>
                <input type="text" class="form-control" name="order_detail_id" value={{ $order_detail->order_detail_id}} />
            </div>
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <input type="text" class="form-control" name="product_id" value={{ $order_detail->product_id}} />
            </div>            
            <div class="form-group">
                <label for="order_id">Order ID:</label>
                <input type="text" class="form-control" name="order_id" value={{ $order_detail->order_id}} />
            </div> 
            <div class="form-group">
                <label for="product_quantity">Quantity:</label>
                <input type="text" class="form-control" name="product_quantity" value={{ $order_detail->product_quantity}} />
            </div>           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
