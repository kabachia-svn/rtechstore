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
            <h1>Products</h1>
            <div>
                <a style="margin: 19px" href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Product ID</td>
                     <td>Name</td>
                     <td>Supplier ID</td>
                     <td>Order ID</td>
                     <td colspan= 2>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->supplier_id }}</td>
                        <td>{{ $product->order_id }}</td>
                        <td>
                            <a href="{{ route('products.edit',$product->product_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->product_id)}}" method="post">
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
