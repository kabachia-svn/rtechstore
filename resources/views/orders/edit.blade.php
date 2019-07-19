@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Order</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('orders.update', $order->order_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="order_id">Order Id:</label>
                <input type="text" class="form-control" name="order_id" value={{ $order->order_id}} />
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="order_date" id="date" value={{ $order->order_date}} />
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
                <label for="headquarters_id">Headquarters:</label>
                    <select class="form-control" name="headquarters_id">
                        <option value="{{ $order->headquarters_id}}">{{ $order->headquarters_id}}</option>
                        @foreach($headquarters as $headquarter)
                            <option value="{{ $headquarter->headquarters_id}}">{{ $headquarter->name}}</option>
                        @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
