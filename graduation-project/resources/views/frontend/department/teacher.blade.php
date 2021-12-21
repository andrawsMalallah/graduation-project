@extends('layouts.app')

@section('content')
<div class="container my-2 p-3">
    <div class="teacher-container">

        @if ($teacher->image)
        <img src="{{ asset($teacher->image) }}" class="rounded-circle teacher-image mr-5 mb-3" alt="">
        @else
        <img src="{{ asset('images/avatar.png') }}" class="rounded-circle teacher-image mr-5 mb-3" alt="">
        @endif

        <div class="">
            <div class="font-weight-bold teacher-info">{{ $teacher->name }}</div>
            <p>
                {!! $teacher->description !!}
            </p>
        </div>
    </div>
</div>


@endsection