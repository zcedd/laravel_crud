@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-center m-5">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>subject</th>
                <th>grade</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($data as $datas) --}}
            <tr>
                <th>{{$data->name}}</th>
                <th>{{$data->email}}</th>
                <th>{{$data->name}}</th>
                <th>{{$data->name}}</th>
                {{-- <td><a href="{{ route('teacherLogout') }}">sdfsdf</a></td>
                <td><a href="{{ route('teacherLogout') }}">sdfsdf</a></td>
                <td><a href="{{ route('teacherLogout') }}">sdfsd</a></td> --}}
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@stop