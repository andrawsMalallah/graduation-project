@extends('layouts.dashboard')

@section('content')
<div class="pt-5">
   <div class="card border-0 p-4">
       <h3 class="pb-2"><strong>From:</strong> {{ $contact->name }} ({{ $contact->email }})</h3>
    <p class="">{{ $contact->message }}</p>
    {{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
   </div>
</div>
@endsection