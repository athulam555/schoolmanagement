@extends('layout.master')
@section('content')
<div class="container">

    <div class="card text-center">
        <div class="card-header">
           School Management System
        </div>
        <div class="card-body">
            <h5 class="card-title">School Management System</h5>
            <p class="card-text">School Management System with students and mark can be added</p>
            <a href="{{ route('student.index') }}" class="btn btn-primary">All Students</a>
        </div>
    </div>
</div>
@endsection