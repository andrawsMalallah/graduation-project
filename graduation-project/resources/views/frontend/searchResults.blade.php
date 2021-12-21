@extends('layouts.app')

@section('content')
<div class="container mb-5">
    @if ($departments->count() == 0 && $labs->count() == 0 && $teachers->count() == 0 && $books->count() == 0 &&
    $posts->count() == 0)
    <h3 class="text-center my-4 pb-2">No results for: <span class="font-weight-bold">{{$term}}</span></h3>
    @else
    <h3 class="text-center my-4 pb-2">Search results for: <span class="font-weight-bold">{{$term}}</span></h3>

    @if ($posts->count() > 0)
    @foreach ($posts as $post)
    <section class="search-results w-100 shadow-sm mt-3 p-3 card border-0">
        @if ($post->approved)
        <a target="_blank" class="text-dark text-decoration-none search-result"
            href="{{ route('post.show', $post->id) }}">
            <div class="p-3 d-flex align-items-center">
                <img src="{{ $post->image }}" alt="" class="mr-3 post-img-search">
                <div>
                    <h4>{{ $post->title }}</h4>
                </div>
            </div>
        </a>
        @endif
    </section>
    @endforeach
    @endif

    @if ($departments->count() > 0)
    @foreach ($departments as $department)
    <section class="search-result w-100 shadow-sm mt-3 p-3 card border-0">
        <a target="_blank" class="text-dark text-decoration-none"
            href="{{ route('department.show', $department->id) }}">
            <div class="p-3">
                <h4>{{ $department->name }}</h4>
            </div>
        </a>
    </section>
    @endforeach
    @endif

    @if ($labs->count() > 0)
    @foreach ($labs as $lab)
    <section class="search-result w-100 shadow-sm mt-3 p-3 card border-0">
        <a target="_blank" class="text-dark text-decoration-none"
            href="{{ route('lab.show', $lab->id) }}">
            <h4 class="p-3">{{ $lab->name }}</h4>
        </a>
    </section>
    @endforeach
    @endif

    @if ($teachers->count() > 0)
    @foreach ($teachers as $teacher)
    <section class="search-result w-100 shadow-sm mt-3 p-3 card border-0">
        <a target="_blank" class="text-dark text-decoration-none" href="{{ route('teacher.show', $teacher->id) }}">
            <h4 class="p-3">{{ $teacher->name }}</h4>
        </a>
    </section>
    @endforeach
    @endif

    @if ($books->count() > 0)
    <div class="">
        @foreach ($books as $book)
        <section class="search-result w-100 shadow-sm mt-3 p-3 card border-0">
            <a target="_blank" class="text-dark text-decoration-none" href="{{ $book->link }}">
                <h4 class="p-3">{{ $book->name }}</h4>
            </a>
        </section>
        @endforeach
    </div>
    @endif
    @endif
</div>
@endsection