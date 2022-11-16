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
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal" data-edit-id="{{ $datas->id }}" data-edit-name="{{ $datas->student->name }}" data-edit-grade="{{ $datas->grade }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-delete-id="{{ $datas->id }}" data-delete-name="{{ $datas->student->name }}">Delete</button>
                </th>
            </tr>

            <!-- Modal -->
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('modals')
    @include('Modals.deleteModal')
    @include('Modals.editModal')
@stop

@section('script')
<script>
    const editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const name = button.getAttribute('data-edit-name');
        const id = button.getAttribute('data-edit-id');
        const grade = button.getAttribute('data-edit-grade');

        const modalTitle = editModal.querySelector('.modal-title');
        const modalBodyInput = editModal.querySelector('.modal-body input');

        modalTitle.textContent = `Edit grade for ${name}`;
        modalBodyInput.value = grade;
    })

    const deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const name = button.getAttribute('data-delete-name');
        const id = button.getAttribute('data-delete-id');
        const grade = button.getAttribute('data-delete-grade');
        const modalTitle = deleteModal.querySelector('.modal-title');
        modalTitle.textContent = `Delete grade for ${name}`;
    })
</script>
@stop