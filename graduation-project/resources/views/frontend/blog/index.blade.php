@extends('layouts.app')

@section('content')
<style>
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
        @foreach ($posts as $post)
        @if ($post->approved)
        <div class="post mb-5 mx-auto">
            <img src="{{ asset($post->image) }}" class="mx-auto mb-3 rounded" alt="">
            <a href="{{ route('post.show', $post->title) }}" class="text-decoration-none text-dark">
                <h4 class="post-title">{{ $post->title }}</h4>
            </a maxlength="30">
            {!! \Str::limit($post->description, 80) !!} </a>

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
@endsection