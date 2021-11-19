@extends('layouts.dashboard')

@section('content')
<div class="pt-4">
    <a href="{{ route('messages') }}" class="btn btn-sm btn-info mb-2">{{ '< ' }}Back</a>
    <div class="card text-center">
        <div class="card-header">
            {{ $contact->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $contact->email }}</h5>
            <p class="card-text">{{ $contact->message }}</p>
        </div>
        <div class="card-footer text-muted">
            {{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
        </div>
    </div>
</div>
@endsection