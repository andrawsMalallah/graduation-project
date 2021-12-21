@extends('layouts.dashboard')

@section('content')
<section class="py-4">
    <h1 class="text-center">College of Electrical Engineering Technology</h1>
    <div class="underline"></div>

    <div class="cards row py-5">
        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Departments <span> ({{ $departments }})</span></h5>
                    <a href="{{ route('departments') }}">More information >></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Labs <span> ({{ $labs }})</span></h5>
                    <a href="{{ route('labs') }}">More information >></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Teachers <span> ({{ $teachers }})</span></h5>
                    <a href="{{ route('teachers') }}">More information >></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Books <span> ({{ $books }})</span></h5>
                    <a href="{{ route('dashboard.library') }}">More information >></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Posts <span> ({{ $posts }})</span></h5>
                    <a href="{{ route('dashboard.blog') }}">More information >></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 pt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Users <span> ({{ $users }})</span></h5>
                    <a href="{{ route('dashboard.users') }}">More information >></a>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
@endsection