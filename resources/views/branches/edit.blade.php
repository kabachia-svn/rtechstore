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
        <form method="post" action="{{ route('branches.update', $branch->branch_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="branch_id">Branch Id:</label>
                <input type="text" class="form-control" name="branch_id" value={{ $branch->branch_id}} />
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $branch->name}} />
            </div>
            <div class="form-group">
                <label for="headquarters_id">Headquarters:</label>
                    <select class="form-control" name="headquarters_id">
                        <option value="{{ $branch->headquarters_id}}">{{ $branch->headquarters_id}}</option>
                        @foreach($headquarters as $headquarter)
                            <option value="{{ $headquarter->headquarters_id}}">{{ $headquarter->name}}</option>
                        @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
