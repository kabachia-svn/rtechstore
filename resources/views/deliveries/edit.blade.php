@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Delivery</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('deliveries.update', $delivery->delivery_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="delivery_id">Delivery Id:</label>
                <input type="text" class="form-control" name="delivery_id" value={{ $delivery->delivery_id}} />
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="delivery_date" id="date" value={{ $delivery->delivery_date}} />
                <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script>
                    $(document).ready( function(){
                        $('#date').datepicker({ dateFormat: 'yy-mm-dd'});
                    });
                 </script>
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier:</label>
                    <select class="form-control" name="supplier_id">
                        <option></option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id}}">{{ $supplier->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_detail_id">Order Detail:</label>
                    <select class="form-control" name="order_detail_id">
                        <option></option>
                        @foreach($order_details as $order_detail)
                            <option value="{{ $order_detail->order_detail_id}}">{{ $order_detail->order_detail_id}}</option>
                        @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
