@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-center m-5">
    <div class="card" style="width: 25rem;">
        <div class="card-title d-flex justify-content-center h3 m-2">Students Login</div>
        <div class="card-body">
            <form action="{{ route("student-Login") }}" method="post" >
                @if(Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="Email"class="form-control" id="exampleInputEmail1" value="{{old('Email')}}">
                    <span class="text-danger">@error('Email') {{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" id="exampleInputPassword1" value="{{old('Password')}}">
                    <span class="text-danger">@error('Password') {{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="row">
                <a href="{{ route('studentRegistration') }}" class="d-flex justify-content-center">dont have account?</a>
            </div>
            <div class="row">
                <a href="{{ route('teacherLogin') }}" class="d-flex justify-content-center">Are you a teacher?</a>
            </div>
        </div>
    </div>
</div>

@stop