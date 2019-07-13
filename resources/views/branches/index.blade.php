@extends('base')

@section('main')
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Branches</h1>
            <div>
                <a style="margin: 19px" href="{{ route('branches.create')}}" class="btn btn-primary">New Branch</a>
            </div>
            <table class="table table-stripped">
                <thead>
                   <tr>
                     <td>Branch Id</td>
                     <td colspan= 2>Actions</td>
                   </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->branch_id }}</td>
                        <td>
                            <a href="{{ route('branches.edit',$branch->branch_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('branches.destroy', $branch->branch_id)}}" method="post">
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
