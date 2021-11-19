@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline pt-3 pb-4">
    <h5>Labs</h5>
    <a type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modal">
        Add a lab
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($labs as $lab)
                <td>{{ $lab->name }}</td>
                <td>{{ $lab->department->name }}</td>
                <td>
                    <a href="{{ route('lab.edit', $lab->id) }}" class="mb-1 btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('lab.delete', $lab->id) }}" method="post" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger mb-1">Delete</button>
                    </form>
                </td>
            @endforeach
        </tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add new lab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lab.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name</label>
                        <div class="row">
                            <input class="form-control mx-3" name="name" required />
                        </div>
                    </div>

                    <select class="custom-select" name="department" required>
                        <option selected disabled>Select The Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>

                    <div class="input-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="image" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="video">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Video</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" id="my-editor" name="description" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection