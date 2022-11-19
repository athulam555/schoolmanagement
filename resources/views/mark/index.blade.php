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
                            <h2>Mark <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4" style="margin-top:10px;">
                            <a href={{ route('mark.create') }} class="btn btn-success btn-sm"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" style="margin-top:20px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Term</th>
                        <th>Total Mark</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($markDatas as $mark)
                    <tr>
                        <td>{{ $mark->student->name}}</td>
                        <td>{{ $mark->maths_mark}}</td>
                        <td>{{ $mark->science_mark}}</td>
                        <td>{{ $mark->history_mark}}</td>
                        <td>{{ $term[$mark->term]}}</td>
                        <td>{{ $mark->total_mark}}</td>
                        <td>{{ $mark->created_at->format('M d,Y H:i A')}}</td>
                        <td style="display: flex;">
                            <a href="{{ route('mark.create',['id' =>$mark->id]) }}" class="btn btn-info btn-sm"
                                title="Edit" style="margin-right: 10px;">Edit</a>
                            <form action="{{ route('mark.destroy',$mark->id) }}" method="Post">
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