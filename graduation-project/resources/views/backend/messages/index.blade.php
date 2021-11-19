@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline pt-3 pb-4">
    <h5>Messages</h5>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>
                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-secondary mb-1">View</a>
                <form action="{{ route('messages.delete', $message->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection