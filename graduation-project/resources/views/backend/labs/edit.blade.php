@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <h2 class="text-center">{{ $lab->name }}</h2>
    <div class="underline"></div>

    <form action="{{ route('lab.update', $lab->id) }}" method="post" enctype="multipart/form-data" class="py-4">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-form-label text-md-right">Name</label>
            <div class="row">
                <input class="form-control mx-3" name="name" required value="{{ $lab->name }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Department</label>
            <select class="custom-select" name="department">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $lab->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="col-form-label text-md-right">Image</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="validatedInputGroupCustomFile">
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Change Image</label>
            </div>

            <div class="input-group-append">
                <a href="{{ route('lab.image.view', $lab->id) }}" target="_blank"
                    class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
            </div>
        </div>

        <label class="col-form-label text-md-right">Video</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="video" id="validatedInputGroupCustomFile">
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose Video</label>
            </div>

            @if ($lab->video)
            <div class="input-group-append">
                <a href="{{ route('lab.video.view', $lab->id) }}" target="_blank"
                    class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
            </div>

            <div class="input-group-append">
                <a href="{{ route('lab.video.delete', $lab->id) }}"
                    class="btn btn-outline-danger rounded ml-2" type="button">Remove</a>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Description</label>
            <div class="">
                <textarea class="form-control" id="my-editor" name="description"
                    required>{{ $lab->description }}</textarea>
            </div>
        </div>

        <a href="{{ route('labs') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection