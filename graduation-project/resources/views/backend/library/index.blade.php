@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Library</h4>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
        Add a book
    </a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">Book name</th>
            <th scope="col">Department</th>
            <th scope="col">Stage</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->department->name }}</td>
            <td>{{ $book->stage }}</td>
            <td>
                <a href="{{ route('library.edit', $book->id) }}" class="btn btn-sm btn-info mb-1">Edit</a>
                <form action="{{ route('library.delete', $book->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
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
                <h5 class="modal-title" id="ModalLabel">Add new book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('library.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name</label>
                        <div class="row">
                            <input class="form-control mx-3" name="name" required/>
                        </div>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="custom-select" name="department" required>
                            <option selected disabled>Select Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <select class="custom-select" name="stage" required>
                        <option selected disabled>Select Stage</option>

                        <option value="First Stage">First Stage</option>
                        <option value="Second Stage">Second Stage</option>
                        <option value="Third Stage">Third Stage</option>
                        <option value="Fourth Stage">Fourth Stage</option>
                    </select>
                    @error('stage')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="input-group">
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
                        <label class="col-form-label text-md-right">Link</label>
                        <div class="row">
                            <input class="form-control mx-3" name="link" required/>
                        </div>
                        @error('link')
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
</div>
</div>
@endsection