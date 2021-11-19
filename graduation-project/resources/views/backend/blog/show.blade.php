@extends('layouts.dashboard')

@section('content')
<div class="d-flex mt-3">
    <div class="w-25">
        <a href="{{ route('dashboard.blog') }}" class="btn btn-sm btn-info">{{ '< ' }}Back</a>
    </div>
        
        <div class="w-50 d-flex flex-column justify-content-center w-100">
        
            <div class="post">
                <div style="width: 800px" class="mx-auto content-sm">
                    <img src="{{ asset($blog->image) }}" class="w-100 " alt="">
                    <p class="pt-2">{{ $blog->description }}</p>
        
                    <h6 class="font-weight-bold">{{ $blog->user->name }} <span class="ml-4">{{
                            \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span></h6>
                    <hr>
                </div>
            </div>
        
        </div>

@endsection