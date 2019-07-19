@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a product</h1>
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
             <form method="post" action="{{ route('products.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="product_id">Product ID: </label>
                     <input type="text" class="form-control" name="product_id"/>
                 </div>
                 <div class="form-group">
                     <label for="name">Name: </label>
                     <input type="text" class="form-control" name="name"/>
                 </div>
                 <div class="form-group">
                     <label for="supplier_id">Supplier:</label>
                     <select class="form-control" name="supplier_id">
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id}}">{{ $supplier->name}}</option>
                        @endforeach
                     </select>
                  </div>
                 <button type='submit' class='btn btn-primary-outline'>Add product</button>
             </form>
        </div>
    </div> 
</div>
@endsection
