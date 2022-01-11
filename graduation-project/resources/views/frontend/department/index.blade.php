@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if ($department->type == 'scientific')
    <h1 class="mb-4 pb-2 mt-2">{{$department->name }}</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                aria-selected="true">About</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="laboratories-tab" data-toggle="tab" href="#laboratories" role="tab"
                aria-controls="laboratories" aria-selected="false">Labs</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="teachers"
                aria-selected="false">Teachers</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="{{ route('library', $department->name) }}" target="_blank"
                aria-selected="false">Library</a>
        </li>
    </ul>
    <div class="tab-content my-3 pb-2" id="myTabContent">

        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
            @if ($department->video)
            <div class="dep-video mb-5 mt-3">{!! $department->video !!}</div>
            @endif
            {!! $department->description !!}
        </div>

        <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
            <div class="teacher-container">
                <div class="row">
                    @foreach ($department->teachers as $teacher)
                    <div class="p-3 teacher-card">
                        <a class="text-decoration-none" href="{{ route('teacher.show', $teacher->name) }}">
                            @if ($teacher->image)
                            <img src="{{ asset($teacher->image) }}" class="rounded teachers-image mb-2 mx-auto" alt="">
                            @else
                            <img src="{{ asset('images/avatar.png') }}" class="rounded teachers-image mb-2 mx-auto"
                                alt="">
                            @endif
                            <h4 class="text-dark font-weight-bold text-center">{{ $teacher->name }}</h4>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="laboratories" role="tabpanel" aria-labelledby="laboratories-tab">
            <div class="pb-3 pt-1">
                @foreach ($department->labs as $lab)
                <div class="pb-5">
                    <h3 class="text-dark font-weight-bold">{{ $lab->name }}</h3>
                    {!! $lab->description !!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <h1 class="mb-4">{{$department->name }}</h1>
    @if ($department->video)
    <div class="dep-video py-3">
        {!! $department->video !!}
    </div>
    @endif

    <div class="my-3 pb-3">
        {!! $department->description !!}
    </div>
    @endif
</div>
@endsection