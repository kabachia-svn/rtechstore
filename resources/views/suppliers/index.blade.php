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
            <h1>Suppliers</h1>
            <div>
                <a style="margin: 19px" href="{{ route('suppliers.create')}}" class="btn btn-primary">New Supplier</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Supplier ID</td>
                     <td>Name</td>
                     <td colspan= 2>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->supplier_id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit',$supplier->supplier_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('suppliers.destroy', $supplier->supplier_id)}}" method="post">
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
