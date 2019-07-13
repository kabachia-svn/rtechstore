@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update branch</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('headquarters.update', $headquarters->headquarters_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="headquarters_id">Headquarter Id:</label>
                <input type="text" class="form-control" name="headquarters_id" value={{ $headquarters->headquarters_id}} />
            </div>
            <div class="form-group">
                <label for="branch_id">Branch Id:</label>
                <select class="form-control" name="branch_id">
                    @foreach($branches as $branch)
                        <option value="{{ $branch->branch_id}}">{{ $branch->branch_id}}</option>
                    @endforeach
                </select> 
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
