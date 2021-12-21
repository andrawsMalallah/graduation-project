@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center">{{$department->name }}</h1>
    <div class="underline mb-4"></div>

    <div class="pb-3 pt-1">
        @foreach ($department->labs as $lab)
        <div class="pb-3">
            <h3 class="text-dark font-weight-bold">{{ $lab->name }}</h3>
            {!! $lab->description !!}
        </div>
        @endforeach
    </div>

</div>
@endsection