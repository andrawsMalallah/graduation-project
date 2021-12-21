@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Users</h4>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
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
            <td >{{ $user->email }}</td>
            <td>
                <span class="{{ $user->admin ? 'text-primary font-weight-bold' : ''}}">
                    @if($user->admin)
                    Admin
                    @elseif ($user->admin && $user->blogger)
                    Admin
                    @elseif ($user->blogger && !$user->admin)
                    Blogger
                    @else
                    User
                    @endif
                </span>
            </td>
            <td>
                <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    @if (!$user->admin)
                    <button type="submit" class="btn btn-sm btn-danger mt-1">Delete</button>
                    @endif
                </form>

               @if (!$user->admin)
                   <form action="{{ route('user.permission', $user->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('PATCH')
                        @if($user->blogger && !$user->admin)
                        <button type="submit" class="btn btn-sm btn-primary mt-1">Demote</button>
                        @elseif(!$user->blogger)
                        <button type="submit" class="btn btn-sm btn-primary mt-1">Promote</button>
                        @endif
                    </form>
               @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection