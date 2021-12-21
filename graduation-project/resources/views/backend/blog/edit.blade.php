@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <form action="{{ route('post.update', $blog->id) }}" method="post" enctype="multipart/form-data" class="py-4">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label class="col-form-label text-md-right">Title</label>
            <div class="row">
                <input class="form-control mx-3" name="title"  value="{{ $blog->title }}" />
            </div>
            @error('title')
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
                <a href="{{ route('post.image.view', $blog->id) }}" target="_blank"
                    class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label text-md-right">Description</label>
            <div class="">
                <textarea class="form-control" id="my-editor" name="description"
                    >{{ $blog->description }}</textarea>
            </div>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route('dashboard.blog') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection