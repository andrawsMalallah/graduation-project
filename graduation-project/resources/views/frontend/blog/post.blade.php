@extends('layouts.app')

@section('content')

<div class="container my-2 p-3 post-container">
    <img src="{{ asset($blog->image) }}" alt="" class="mx-auto">
    <div class="mx-auto">
        <h4 class="pt-4">{{ $blog->title }}</h4>
        <p class="">{!! $blog->description !!}</p>
        <div class="d-flex align-items-center justify-content-between w-full">
            <h6 style='font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"'
                class="pt-3 font-weight-bold">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</h6>
        </div>
    </div>
</div>


@endsection