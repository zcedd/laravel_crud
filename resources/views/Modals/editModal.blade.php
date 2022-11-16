<div class="modal fade" id="editModal{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Grades for {{$datas->student->name}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('edit', ['id' => $datas->id]) }}" method="POST" id="edit-grade-form">
                @csrf
                <div class="mb-3">
                    <label for="grades" class="col-form-label">Grades:</label>
                    <input type="text" class="form-control" id="editGrades" name="edit" value="{{$datas->grade}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="edit-submit">Save changes</button>
            </div>
        </form>
    </div>
    </div>
</div>