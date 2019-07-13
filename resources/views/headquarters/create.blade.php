@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a headquarter</h1>
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
             <form method="post" action="{{ route('headquarters.store')}}">
                 @csrf
                 <div class="form-group">
                     <label for="headquarters_id">Headquarters ID: </label>
                     <input type="text" class="form-control" name="headquarters_id"/>
                 </div>
                 <div class="form-group">
                     <label for="branch_id">Branch ID: </label>
                     <select class="form-control" name="branch_id">
                         @foreach($branches as $branch)
                             <option value="{{ $branch->branch_id}}">{{ $branch->branch_id}}</option>
                         @endforeach 
                     </select>
                 </div>
                 <button type='submit' class='btn btn-primary-outline'>Add headquarter</button>
             </form>
        </div>
    </div> 
</div>
@endsection
