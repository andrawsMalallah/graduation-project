@extends('layouts.app')

@section('content')
<style>
.clash-card__unit-description {
  padding: 1px;
  margin-bottom: 1px;  
}
</style>
<section class="container py-5">
    <span class="left-border">
        <h2 class="ml-2">Library</h2>
        <h6 class="text-secondary ml-2">Resources for {{ $department->name }}</h6>
    </span>

    <div class="books-container pt-4 d-flex flex-wrap">
        @forelse ($books as $book)

        <a style="border-radius: 10px" class="text-dark text-decoration-none mx-auto" href="{{ $book->link }}" target="_blank">
                <div style="border-radius: 10px" class="card border-0 m-4 department shadow">
                    <img style="border-radius: 10px" src="{{ asset($book->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="text-center card-title text-capitalize" style="font-size: 1rem">{{ $book->name }}</h6>
                        <div style="font-size: 1rem" class="text-center">
                        {{ $book->stage }}
      </div>
                        
                    
                    </div>
                </div>
            </a>

        @empty
        <h2 class="w-100 text-center">No resources for this department</h2>
        @endforelse
    </div>
</section>
@endsection
