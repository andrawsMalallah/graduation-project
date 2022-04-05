@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <h2 class="text-center">{{ $teacher->name }}</h2>
    <div class="underline"></div>

    <form action="{{ route('teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data"
        class="py-4">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                @if ($teacher->image)
                    <img src="{{ asset($teacher->image) }}" alt="" class="rounded-circle" style="width: 200px; height: 200px">
                @else
                    <img src="{{ asset('images/avatar.png') }}" alt="" class="rounded-circle" style="width: 200px; height: 200px">
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label text-md-right">Name</label>
                    <div class="row">
                        <input class="form-control mx-3" name="name" required value="{{ $teacher->name }}" />
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="col-form-label text-md-right">Department</label>
                    <select class="custom-select" name="department" required>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $teacher->department_id ? 'selected' : '' }}>{{
                            $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <label class="col-form-label text-md-right">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="validatedInputGroupCustomFile">
                        <label class="custom-file-label" for="validatedInputGroupCustomFile">Change Image</label>
                    </div>
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Description</label>
            <div class="">
                <textarea class="form-control" id="my-editor" name="description"
                    required>{{ $teacher->description }}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route('teachers') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

