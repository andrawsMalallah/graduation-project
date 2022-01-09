@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Teachers</h4>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
        Add a teacher
    </a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col" style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;">Name</th>
            <th scope="col" style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;">Department</th>
            <th scope="col" style="text-align:center ;width: 20% ; font-size: 0.95rem; font-weight: 600; color: #212529;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
        <tr style='font-family: inherit; font-size: 0.9rem; font-weight: 600; vertical-align: text-top;' >
                <td style='text-align:center ;height: 100%; font-family: inherit; font-size: 0.9rem; font-weight: 600;color: #495057; vertical-align: text-top;' >{{ $teacher->name }}</td>
                <td style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: text-top;' >{{ $teacher->department->name }}</td>
                <td style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; vertical-align: text-top;' >
                    <form class="d-inline-block" ><a href="{{ route('teacher.edit', $teacher->id) }}" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom">Edit</a></form>
                    <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="para1" style="background: #e3342f; border-color: #e3342f;" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
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
                <h5 class="modal-title" id="ModalLabel">Add new teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name</label>
                        <div class="row">
                            <input class="form-control mx-3" required name="name"/>
                        </div>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <select class="custom-select" required name="department">
                        <option selected disabled>Select Department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group my-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="image">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" rows="3" id="my-editor" name="description" required></textarea>
                        </div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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