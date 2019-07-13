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
            <h1>Headquarters</h1>
            <div>
                <a style="margin: 19px" href="{{ route('headquarters.create')}}" class="btn btn-primary">New HeadQuarter</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Headquarters ID</td>
                     <td>Name</td>
                     <td colspan= 2>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($headquarters as $headquarter)
                    <tr>
                        <td>{{ $headquarter->headquarters_id }}</td>
                        <td>{{ $headquarter->name }}</td>
                        <td>
                            <a href="{{ route('headquarters.edit',$headquarter->headquarters_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('headquarters.destroy', $headquarter->headquarters_id)}}" method="post">
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
