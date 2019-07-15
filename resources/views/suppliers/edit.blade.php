@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update supplier</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('suppliers.update', $supplier->supplier_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="supplier_id">Supplier Id:</label>
                <input type="text" class="form-control" name="supplier_id" value={{ $supplier->supplier_id}} />
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $supplier->name}} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
