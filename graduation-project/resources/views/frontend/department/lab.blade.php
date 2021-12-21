@extends('layouts.app')

@section('content')
<div class="container my-2 p-3">
    <div class="d-flex align-items-start">
        @if ($lab->image)
            <img src="{{ asset($lab->image) }}" class="rounded teacher-image mr-5 mt-2" alt="">
        @endif

        <div class="">
            <div class="font-weight-bold teacher-info">{{ $lab->name }}</div>
            <p>
                {!! $lab->description !!}
            </p>
        </div>
    </div>
</div>
@endsection