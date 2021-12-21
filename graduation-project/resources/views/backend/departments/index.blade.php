@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Departments</h4>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
        Add a department
    </a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ $department->type }}</td>
            <td>
                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-info mb-1">Edit</a>

                <form action="{{ route('department.delete', $department->id) }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger mb-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add new department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name</label>
                        <div class="row">
                            <input class="form-control mx-3" name="name" required/>
                            @error('name')
                            <span class="text-danger pl-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <select class="custom-select" name="type" required>
                        <option selected disabled>Select The Type</option>
                        <option value="scientific">Scientific</option>
                        <option value="management">management</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="image" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label class="col-form-label text-md-right mt-1">Video</label>
                        <div class="row">
                            <input class="form-control mx-3" name="video" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" id="my-editor" name="description" required></textarea>
                        </div>
                    </div>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

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
