@extends('layouts.app')

@section('content')
<div id="carousel" class="carousel slide container mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($sliders as $index => $slider)
        <li data-target="#carousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)
        
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset($slider->image) }}" class="d-block w-100 carousel-img" alt="...">
            <div class="carousel-caption d-md-block">
                <a href="{{ route('post.show', $slider->id) }}" target="_blank" class="text-white text-decoration-none">
                    <h4 class="carousel-title">{{ $slider->title }}</h4>
                </a>
            </div>
        </div>
        
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<section class="py-4">
    <div class="container">
        <h2 class="text-center">Scientific Departments</h2>
        <div class="underline"></div>

        <div class="departments my-4 d-flex flex-wrap">
            @foreach ($departments as $department)
            <a class="text-dark text-decoration-none" href="{{ route('department.show', $department->id) }}">
                <div class="card border-0 m-4 department shadow-sm">
                    <img src="{{ asset($department->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-capitalize">{{ $department->name }}</h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="container mb-3">
    <div class="map">
        <h2 class="text-center">Geographical Location</h2>
        <div class="underline mb-2"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.3185212325916!2d44.39575484242206!3d33.25803475777558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1559d5544036cbf5%3A0x31fd853b044c0355!2sCollege%20of%20Electrical%20and%20Electronic%20Technology!5e0!3m2!1sen!2siq!4v1636021461903!5m2!1sen!2siq"
            class="my-4 w-100 shadow rounded" width="600" height="450" style="border:0;" allowfullscreen=""
            loading="lazy"></iframe>
    </div>
</section>
@endsection