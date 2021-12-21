@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Blog posts</h4>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
        Add a Post
    </a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>
                @if (!$post->approved)
                <form action="{{ route('post.approve', $post->id) }}" method="post" class="d-inline-block">
                    @method('PATCH')
                    @csrf
                    <button class="btn btn-sm btn-primary mt-1">Approve</button>
                </form>
                @endif
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-info mt-1">Edit</a>
                <form action="{{ route('post.delete', $post->id) }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger mt-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Create New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Title</label>
                        <div class="row">
                            <input class="form-control mx-3" name="title" required />
                        </div>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group">

                        <div class="custom-file">
                            <input type="file" required name="image" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mt-1">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" required rows="3" id="my-editor"
                                name="description"></textarea>
                        </div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

