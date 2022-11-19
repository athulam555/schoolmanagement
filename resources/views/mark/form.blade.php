@extends('layout.master')
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  $mark ? route('mark.store',['id' => $mark->id])  : route('mark.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-2">
                        <label for="name" class="form-label">Name:</label>
                        <select class="form-control" name="student_id" id="student">
                            <option value="">-- Select -- </option>
                            @foreach($studentDatas as $student)
                            <option value="{{ $student->id}}" {{ ($mark && $mark->student_id == $student->id) ? 'selected' : '' }}> {{ $student->name}}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <label for="name" class="form-label">Maths Mark:</label>
                        <input type="number" class="form-control" id="maths" name="maths_mark" value="{{ $mark ? $mark->maths_mark : '' }}">
                        @error('maths_mark')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <label for="name" class="form-label">Science Mark:</label>
                        <input type="number" class="form-control" id="science" name="science_mark" value="{{ $mark ? $mark->science_mark : '' }}">
                        @error('science_mark')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <label for="name" class="form-label">History Mark:</label>
                        <input type="number" class="form-control" id="history" name="history_mark" value="{{ ($mark) ? $mark->history_mark : '' }}">
                        @error('history_mark')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <label for="name" class="form-label">Term:</label>
                        <select class="form-control" name="term" id="term">
                            <option value="">-- Select -- </option>
                            @foreach($term as $key => $termData)
                            <option value="{{$key}}" {{ ($mark && $mark->term == $key) ? 'selected' : '' }}>{{ $termData}}</option>
                            @endforeach
                        </select>
                        @error('term')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <div style="margin-top: 35px;">
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection