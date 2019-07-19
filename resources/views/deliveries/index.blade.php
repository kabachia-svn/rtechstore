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
            <h1>Deliveries</h1>
            <div>
                <a style="margin: 19px" href="{{ route('deliveries.create')}}" class="btn btn-primary">New Delivery</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Delivery ID</td>
                     <td>Date</td>
                     <td>Supplier ID</td>
                     <td colspan= 3>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach($deliveries as $delivery)
                    <tr>
                        <td>{{ $delivery->delivery_id }}</td>
                        <td>{{ $delivery->delivery_date }}</td>
                        <td>{{ $delivery->supplier_id }}</td>
                        <td>
                            <a href="{{ route('deliveries.edit',$delivery->delivery_id)}}" class="btn btn-primary">Edit</a>
                        </td>

                        <td>
                            <form action="{{ route('deliveries.destroy', $delivery->delivery_id)}}" method="post">
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
