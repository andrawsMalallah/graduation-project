@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center">{{$department->name }}</h1>
    <div class="underline mb-4"></div>

    <div class="row">
        @foreach ($department->teachers as $teacher)
        <div class="col-md-3 p-3 teacher-card">
            <a class="text-decoration-none" href="{{ route('teacher.show', $teacher->id) }}">
                @if ($teacher->image)
                    <img src="{{ asset($teacher->image) }}" class="rounded teachers-image mb-2 mx-auto" alt="">
                @else
                    <img src="{{ asset('images/avatar.png') }}" class="rounded teachers-image mb-2 mx-auto" alt="">
                @endif
                <h4 class="text-dark font-weight-bold text-center">{{ $teacher->name }}</h4>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection