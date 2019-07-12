@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a branch</h1>
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
             <form method="post" action="{{ route('branches.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="branch_id">Branch ID: </label>
                     <input type="text" class="form-control" name="branch_id"/>
                 </div>
                 <button type='submit' class='btn btn-primary-outline'>Add branch</button>
             </form>
        </div>
    </div> 
</div>
@endsection
