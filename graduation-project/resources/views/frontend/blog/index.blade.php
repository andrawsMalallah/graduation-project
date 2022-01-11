@extends('layouts.app')

@section('content')
<style>
<<<<<<< HEAD
    .blogs-section {
        width: 100%;
        padding: 50px 5vw;
        display: flex;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 80px;
    }

    .blog-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .blog-overview {
        margin: 10px 0 20px;
        line-height: 30px;
    }

    .btn.dark {
        background: #1b1b1b;
        color: #fff;
    }
</style>

<section class="container py-4 ">
    <h2 style="text-align:center">Blog</h2>
    <div class="mt-5 mx-auto">
=======
.blogs-section{
    width: 100%;
    padding: 50px 5vw;
    display: flex;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 80px;
}

.blog-image{
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.blog-overview{
    margin: 10px 0 20px;
    line-height: 30px;
}

.btn.dark{
    background: #1b1b1b;
    color: #fff;
}

</style>

<section class="container py-4 ">
    <span >
        <h2 style="text-align:center" class="ml-2">Blog</h2>
        @auth
        @if (Auth::user()->admin || Auth::user()->blogger)
            <a class="text-secondary ml-2" data-toggle="modal" data-target="#Modal">
                Create new post
            </a>
        @endif
        @endauth
    </span>


    <div class="pt-3 mt-5 mx-auto">
>>>>>>> 67a4fcfb7e46e3cf9d55edc4e47bee538bb942e6
        @foreach ($posts as $post)
        @if ($post->approved)
        <div class="post mb-5 mx-auto">
            <img src="{{ asset($post->image) }}" class="mx-auto mb-3 rounded" alt="">
<<<<<<< HEAD
            <a href="{{ route('post.show', $post->title) }}" class="text-decoration-none text-dark">
                <h4 class="post-title">{{ $post->title }}</h4>
            </a maxlength="30">
            {!! \Str::limit($post->description, 80) !!} </a>
=======
            <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-dark"><h4 class="post-title">{{ $post->title }}</h4></a maxlength="30" >
            {!! \Str::limit($post->description, 30) !!} </a>
>>>>>>> 67a4fcfb7e46e3cf9d55edc4e47bee538bb942e6

            <h6 class="font-weight-bold mt-2">{{
                \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</h6>
            <hr>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endsection

@section('script')
<<<<<<< HEAD
=======
<script src="/ckeditor/ckeditor.js"></script>
<script>
    if (document.getElementById('my-editor')) {
        CKEDITOR.replace('my-editor');
    }
</script>
>>>>>>> 67a4fcfb7e46e3cf9d55edc4e47bee538bb942e6
@endsection