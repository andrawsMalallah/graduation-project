@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <h2 class="text-center">{{ $department->name }}</h2>
    <div class="underline"></div>

    <form action="{{ route('department.update', $department->id) }}" method="post" enctype="multipart/form-data" class="py-4">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-form-label text-md-right">Name</label>
            <div class="row">
                <input class="form-control mx-3" name="name" required value="{{ $department->name }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Type</label>
            <select class="custom-select" name="type">
                <option selected disabled>Select The Type</option>
                <option value="scientific" {{ $department->type == 'scientific' ? 'selected' : '' }}>Scientific</option>
                <option value="management" {{ $department->type == 'management' ? 'selected' : '' }}>management</option>
            </select>
        </div>

        <label class="col-form-label text-md-right">Image</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="validatedInputGroupCustomFile">
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Change Image</label>
            </div>
            
            <div class="input-group-append">
                <a href="{{ route('department.image.view', $department->id) }}" target="_blank" class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
            </div>
        </div>

        <label class="col-form-label text-md-right">Video</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="video" id="validatedInputGroupCustomFile">
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose Video</label>
            </div>
            
           @if ($department->video)
               <div class="input-group-append">
                    <a href="{{ route('department.video.view', $department->id) }}" target="_blank" class="btn btn-outline-secondary rounded ml-2"
                        type="button">View</a>
                </div>
                
                <div class="input-group-append">
                    <a href="{{ route('department.video.delete', $department->id) }}"  class="btn btn-outline-danger rounded ml-2" type="button">Remove</a>
                </div>
           @endif
        </div>
        
        <div class="form-group">
            <label class="col-form-label text-md-right">Short Description</label>
            <div class="">
                <textarea class="form-control" name="short_description"
                    required>{{ $department->short_description }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Long Description</label>
            <div class="">
                <textarea class="form-control" id="my-editor" name="long_description"
                    required>{{ $department->long_description }}</textarea>
            </div>
        </div>

        <a href="{{ route('departments') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection