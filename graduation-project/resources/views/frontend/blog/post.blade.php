@extends('layouts.app')

@section('content')
<div class="container my-2 p-3 post-container">
    <img src="{{ asset($blog->image) }}" alt="" class="mx-auto">
    <div class="mx-auto">
        <h4 class="pt-4">{{ $blog->title }}</h4>
        <p class="">{!! $blog->description !!}</p>
        <h6 class="pt-1 font-weight-bold">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</h6>
    </div>
</div>
@endsection