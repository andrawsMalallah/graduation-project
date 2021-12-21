@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h1 class="text-center">{{$department->name }}</h1>
    <div class="underline mb-3"></div>

    @if ($department->video)
    <div class="dep-video pb-3">
        {!! $department->video !!}
    </div>
    @endif

    <div class="my-3 pb-3">
        {!! $department->description !!}
    </div>

</div>
@endsection