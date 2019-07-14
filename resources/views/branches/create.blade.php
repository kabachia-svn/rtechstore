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
                 <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" />
                 </div>
                 <div class="form-group">
                     <label for="name">Headquarters:</label>
                     <select class="form-control" name="headquarters_id">
                        @foreach($headquarters as $headquarter)
                            <option value="{{ $headquarter->headquarters_id}}">{{ $headquarter->name}}</option>
                        @endforeach
                     </select>
                  </div>
                 <button type='submit' class='btn btn-primary-outline'>Add branch</button>
             </form>
        </div>
    </div> 
</div>
@endsection
