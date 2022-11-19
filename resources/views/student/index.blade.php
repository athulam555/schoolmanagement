@extends('layout.master')
@section('content')
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="container" style="margin-top: 10px;">
                    <div class="row">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="col-sm-8">
                            <h2>Student <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4" style="margin-top:10px;">
                            <a href={{ route('student.create') }} class="btn btn-success btn-sm"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" style="margin-top:20px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Teacher</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentDatas as $student)
                    <tr>
                        <td>{{ $student->name}}</td>
                        <td>{{ $student->age}}</td>
                        <td>{{ $student->gender}}</td>
                        <td>{{ $teacher[$student->teacher]}}</td>
                        <td style="display: flex;">
                            <a href="{{ route('student.create',['id' =>$student->id]) }}" class="btn btn-info btn-sm"
                                title="Edit" style="margin-right: 10px;">Edit</a>
                            <form action="{{ route('student.destroy',$student->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection