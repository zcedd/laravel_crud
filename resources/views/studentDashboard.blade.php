@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-end">
    <p class="h3 align-self-center m-2">{{$data[0]->student->name}}</p>
    <a href="{{ route('studentLogout') }}" class="btn btn-primary m-3">Logout</a>
</div>
<div class="d-flex justify-content-center mx-5">
    <table class="table">
        <thead>
            <tr>
                <th>Teacher's name</th>
                {{-- <th>subject</th> --}}
                <th>grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $datas)
            <tr>
                <th>{{$datas->teacher->name}}</th>
                {{-- <th>{{$datas->email}}</th> --}}
                <th>{{$datas->grade}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop