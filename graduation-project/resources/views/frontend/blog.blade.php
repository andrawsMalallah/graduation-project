@extends('layouts.app')

@section('content')
<section class="container py-4">
    <span class="left-border">
        <h2 class="ml-2">Blog</h2>
        @auth
        <a type="button" class="text-secondary ml-2" data-toggle="modal" data-target="#Modal">
            Create new post
        </a>
        @endauth
        @guest
        <a class="text-secondary ml-2" href="{{ route('login') }}">Login to create new post</a>
        @endguest
    </span>

    <div class="mt-5 w-50 d-flex flex-column justify-content-center w-100">
        @foreach ($posts as $post)
        @if ($post->approved)
            <div class="post mb-5 w-100">
               <div style="width: 700px" class="mx-auto">
                   <img src="{{ asset($post->image) }}" class="w-100" alt="">
                    <p class="pt-2">{{ $post->description }}</p>
                    
                    <h6 class="font-weight-bold">{{ $post->user->name }} <span class="ml-4">{{
                        \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span></h6>
                <hr>
            </div>
            </div>
        @endif
        @endforeach
    </div>
</section>

<!-- Modal -->
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
                            <input type="file" required name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
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

