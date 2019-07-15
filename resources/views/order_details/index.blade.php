@extends('base')

@section('main')
    <div class="col-sm-12">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Order Detail</h1>
            <div>
                <a style="margin: 19px" href="{{ route('order_details.create')}}" class="btn btn-primary">New Order Details</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Order Detail ID</td>
                     <td>Product ID</td>
                     <td>Order ID</td>
                     <td>Quantity</td>
                     <td colspan= 2>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->order_detail_id }}</td>
                        <td>{{ $order_detail->product_id }}</td>
                        <td>{{ $order_detail->order_id }}</td>
                        <td>{{ $order_detail->product_quantity }}</td>
                        <td>
                            <a href="{{ route('order_details.edit',$order_details->order_detail_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('order_details.destroy', $order_details->order_detail_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
