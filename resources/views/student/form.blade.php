@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  $student ? route('student.store',['id' => $student->id])  : route('student.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="email" placeholder="Student Name" name="name"
                                value="{{ $student ? $student->name : '' }}">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="age" class="form-label">Age:</label>
                            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age"
                                value="{{ $student ? $student->age : '' }}">
                            @error('age')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" mb-3">
                    <div class="row">
                        <div class="col-lg-1">
                            <input class="form-check-input" type="radio" name="gender" id="gendermale" {{ ($student &&
                                $student->gender == 'male') ? 'checked' : '' }} value="male">
                            <label class="form-check-label" for="gendermale">
                                Male
                            </label>
                        </div>
                        <div class="col-lg-1">
                            <input class="form-check-input" type="radio" name="gender" id="genderfemale" {{ ($student &&
                                $student->gender == 'female') ? 'checked' : '' }} value="female">
                            <label class="form-check-label" for="genderfemale">
                                Female
                            </label>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            @error('gender')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="teacher" class="form-label">Reporting Teacher</label>
                            <select class="form-control" id="teacher" name="teacher">
                                <option value="">-- Select -- </option>
                                @foreach($teacher as $val => $teacherData)
                                <option value="{{$val}}" {{ ($student && $student->teacher == $val ) ? 'selected' : ''
                                    }} >{{ $teacherData}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('teacher')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection