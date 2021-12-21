@extends('layouts.app')

@section('content')
<section class="container py-5">
    <span class="left-border">
        <h2 class="ml-2">Library</h2>
        <h6 class="text-secondary ml-2">Resources for {{ $department->name }}</h6>
    </span>

    <div class="books-container pt-4 d-flex flex-wrap">
        @forelse ($books as $book)
        <div class="book">
            <a href="{{ $book->link }}" target="_blank">
                <img src="{{ asset($book->image) }}" class="book-cover rounded-sm" alt="">
            </a>
            <a href="{{ $book->link }}" target="_blank" class="d-inline-block pt-2">
                <h5>{{ $book->name }}</h5>
            </a>
            <div>({{ $book->stage }})</div>
        </div>

        @empty
        <h2 class="w-100 text-center">No resources for this department</h2>
        @endforelse
    </div>
</section>
@endsection