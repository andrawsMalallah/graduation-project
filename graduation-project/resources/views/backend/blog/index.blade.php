@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline pt-3 pb-4">
    <h5>Blog posts</h5>
    <a type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modal">
        Add a Post
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td class="font-weight-bold">{{ $post->user->name }}</td>
            <td>{{substr($post->description, 0, 100)}}...</td>
            <td>
                @if (!$post->approved)
                <form action="{{ route('post.approve', $post->id) }}" method="post" class="d-inline-block">
                    @method('PATCH')
                    @csrf
                    <button class="btn btn-sm btn-primary">Approve</button>
                </form>
                @endif
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-secondary mb-1">View</a>
                <form action="{{ route('post.delete', $post->id) }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger mb-1">Delete</button>
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
                    <div class="input-group mb-3">

                        <div class="custom-file">
                            <input type="file" required name="image" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" required rows="3" name="description"></textarea>
                        </div>
                    </div>
                    @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection