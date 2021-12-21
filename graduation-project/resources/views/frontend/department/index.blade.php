@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center">{{$department->name }}</h1>
    <div class="underline mb-1"></div>
    @if ($department->type == 'scientific')
    <div class="d-flex flex-wrap py-4 justify-content-center">
        <div class="card border-0 shadow-sm department m-2" style="width: 15rem;">
            <a class="text-dark text-decoration-none" href="{{ route('department.about', $department->id) }}">
                <img src="{{ asset($department->image) }}" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title font-weight-bold">About</h5>
                </div>
            </a>
        </div>
        @if ($department->teachers->count() > 0)
            <div class="card card border-0 shadow-sm department m-2" style="width: 15rem;">
                <a class="text-dark text-decoration-none" href="{{ route('department.teachers', $department->id) }}">
                    <img src="{{ asset('images/professor.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Teachers</h5>
                    </div>
                </a>
            </div>
        @endif
        @if ($department->labs->count() > 0)
            <div class="card card border-0 shadow-sm department m-2" style="width: 15rem;">
                <a class="text-dark text-decoration-none" href="{{ route('department.labs', $department->id) }}">
                    <img src="{{ asset('images/labs.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Laboratories</h5>
                    </div>
                </a>
            </div>
        @endif
        @if ($department->library->count() > 0)
            <div class="card card border-0 shadow-sm department m-2" style="width: 15rem;">
                <a class="text-dark text-decoration-none" href="{{ route('library', $department->id) }}">
                    <img src="{{ asset('images/library.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Library</h5>
                    </div>
                </a>
            </div>
        @endif
    </div>
    @else
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