@extends('layouts.dashboard')

@section('content')
<div class="d-flex mt-3">
    <div class="w-25">
        <a href="{{ route('sliders') }}" class="btn btn-sm btn-info">{{ '< ' }}Back</a>
    </div>
        
    <div class="w-50 d-flex flex-column justify-content-center w-100">
            <div style="width: 800px" class="mx-auto content-sm">
                <img src="{{ asset($slider->image) }}" class="w-100 " alt="">
            </div>
    </div>
</div>
@endsection