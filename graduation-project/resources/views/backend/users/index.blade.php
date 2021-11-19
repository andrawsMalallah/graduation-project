@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline pt-3 pb-4">
    <h5>Users</h5>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="{{ $user->admin ? 'text-primary font-weight-bold' : ''}}">{{ $user->admin ? 'Admin' : 'User' }}</span></td>
                <td>
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection