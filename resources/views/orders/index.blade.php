@extends('base')

@section('main')
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Orders</h1>
            <div>
                <a style="margin: 19px" href="{{ route('orders.create')}}" class="btn btn-primary">New Order</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Order ID</td>
                     <td>Date</td>
                     <td>Headquarters ID</td>
                     <td colspan= 3>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->headquarters_id }}</td>
                        <td>
                            <a href="{{ route('orders.edit',$order->order_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('orders.edit',$order->order_id)}}" class="btn btn-primary">Add Details</a>
                        </td>

                        <td>
                            <form action="{{ route('orders.destroy', $order->order_id)}}" method="post">
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
