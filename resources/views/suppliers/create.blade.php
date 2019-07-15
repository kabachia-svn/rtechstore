@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a supplier</h1>
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
             <form method="post" action="{{ route('suppliers.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="supplier_id">Supplier ID: </label>
                     <input type="text" class="form-control" name="supplier_id"/>
                 </div>
                 <div class="form-group">
                     <label for="name">Name: </label>
                     <input type="text" class="form-control" name="name"/>
                 </div>
                 <button type='submit' class='btn btn-primary-outline'>Add supplier</button>
             </form>
        </div>
    </div> 
</div>
@endsection
