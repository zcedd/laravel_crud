@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-end">
    <p class="h3 align-self-center m-2">{{$data[0]->teacher->name}}</p>
    <a href="{{ route('teacherLogout') }}" class="btn btn-primary m-3">Logout</a>
</div>
<div class="d-flex justify-content-center mx-5">
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                {{-- <th>subject</th> --}}
                <th>grade</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $datas)
            <tr>
                <th>{{$datas->student->name}}</th>
                <th>{{$datas->grade}}</th>
                <th>
                    <button id="edit-grade" type="button" class="btn btn-secondary edit-grade" data-bs-toggle="modal" data-bs-target="#editModal{{$datas->id}}" data-edit-id="{{ $datas->id }}" data-edit-name="{{ $datas->student->name }}" data-edit-grade="{{ $datas->grade }}">Edit</button>
                    <button id="delete-grade"type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{$datas->id}}" data-delete-id="{{ $datas->id }}" data-delete-name="{{ $datas->student->name }}">Delete</button>
                </th>
            </tr>
            @include('Modals.deleteModal')
            @include('Modals.editModal')
            @endforeach
        </tbody>
    </table>
</div>
@stop