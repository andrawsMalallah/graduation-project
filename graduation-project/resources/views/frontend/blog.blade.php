@extends('layouts.app')

@section('content')
<section class="container py-5">
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

    <div class="mt-5">
        <div class="post mb-5">
            <img src="{{ asset('images/development/portfolio2.jpg') }}" class="w-100" alt="">
            <p class="pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam officia numquam
                consectetur placeat
                sed ut quibusdam ipsa ea! Libero laborum consequatur voluptatibus aliquid architecto adipisci illo
                dolorum eum earum?</p>
            {{-- <h6>one sec ago</h6> --}}
            <h6 class="font-weight-bold">username <span class="ml-4">one hour ago</span></h6>
            <hr>
        </div>
        <div class="post mb-5">
            <img src="{{ asset('images/development/portfolio8.jpg') }}" class="w-100" alt="">
            <p class="pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam officia numquam
                consectetur placeat
                sed ut quibusdam ipsa ea! Libero laborum consequatur voluptatibus aliquid architecto adipisci illo
                dolorum eum earum?</p>
            {{-- <h6>one sec ago</h6> --}}
            <h6 class="font-weight-bold">username <span class="ml-4">one hour ago</span></h6>
            <hr>
        </div>
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
            <div class="modal-body">
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label text-md-right">Description</label>
                    <div class="">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Post</button>
            </div>
        </div>
    </div>
</div>
@endsection