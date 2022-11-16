@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-center m-5">
    <div class="card" style="width: 25rem;">
        <div class="card-title d-flex justify-content-center h3 m-2">Teachers Registration</div>
        <div class="card-body">
            <form action="{{ route('teacherRegister')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" name="Name" class="form-control" id="exampleInputName1" value="{{old('Name')}}">
                    <span class="text-danger">@error('Name') {{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="Email" class="form-control" id="exampleInputEmail1" value="{{old('Email')}}">
                    <span class="text-danger">@error('Email') {{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" id="exampleInputPassword1" value="{{old('Password')}}">
                    <span class="text-danger">@error('Password') {{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword2" value="{{old('confirmPassword')}}">
                    <span class="text-danger">@error('confirmPassword') {{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="row">
                <a href="{{ route('teacherLogin') }}" class="d-flex justify-content-center">Already have account?</a>
            </div>
            <div class="row">
                <a href="{{ route('studentLogin') }}" class="d-flex justify-content-center">Are you a student?</a>
            </div>
        </div>
        </div>
    </div>
</div>
@stop