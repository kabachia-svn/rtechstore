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
        <form method="post" action="{{ route('branches.update', $branch->id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="branch_id">Branch Id:</label>
                <input type="text" class="form-control" name="branch_id" value={{ $branch->branch_id}} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
