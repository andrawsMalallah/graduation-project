@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <h2 class="text-center">{{ $department->name }}</h2>
    <div class="underline"></div>

    <form action="{{ route('department.update', $department->id) }}" method="post" enctype="multipart/form-data"
        class="py-4">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-form-label text-md-right">Name</label>
            <div class="row">
                <input class="form-control mx-3" name="name" value="{{ $department->name }}" />
                @error('name')
                <span class="text-danger pl-3">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Type</label>
            <select class="custom-select" name="type" required>
                <option selected disabled>Select The Type</option>
                <option value="scientific" {{ $department->type == 'scientific' ? 'selected' : '' }}>Scientific</option>
                <option value="management" {{ $department->type == 'management' ? 'selected' : '' }}>management</option>
            </select>
            @error('type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <label class="col-form-label text-md-right">Image</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="validatedInputGroupCustomFile">
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Change Image</label>
            </div>

            <div class="input-group-append">
                <a href="{{ route('department.image.view', $department->id) }}" target="_blank"
                    class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
            </div>
        </div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label class="col-form-label text-md-right">Video</label>
        <div class="row">
            <input class="form-control mx-3 mb-3" name="video" value="{{ $department->video }}" />
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Description</label>
            <div class="">
                <textarea class="form-control" id="my-editor" name="description"
                    required>{{ $department->description }}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route('departments') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection