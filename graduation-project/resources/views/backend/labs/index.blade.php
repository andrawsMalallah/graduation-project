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
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-sm btn-secondary">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
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
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label text-md-right">Name</label>
                    <div class="row">
                        <input class="form-control mx-3" />
                    </div>
                </div>

                <select class="custom-select">
                    <option selected disabled>Select Department</option>
                    <option value="scientific">Scientific</option>
                    <option value="management">management</option>
                </select>

                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="video" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Video</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label text-md-right">Description</label>
                    <div class="">
                        <textarea class="form-control" rows="3" name="desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>
@endsection