@extends('layouts.dashboard')

@section('content')
<div class="py-5">
    <div class="card border-0 shadow-sm p-4">
        <h3 class="pb-2"><strong>From:</strong> {{ $contact->name }} ({{ $contact->email }})</h3>
        <p class="message pb-4">{{ $contact->message }}</p>
        <strong>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</strong>
    </div>
</div>
@endsection