@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Users</h4>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr style='font-family: inherit; font-size: 0.9rem; font-weight: 600; vertical-align: text-top;'>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Name</th>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Email</th>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Role</th>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td
                style='text-align:center ;height: 100%; font-family: inherit; font-size: 0.9rem; font-weight: 600;color: #495057; vertical-align: text-top;'>
                {{ $user->name }}</td>
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: text-top;'>
                {{ $user->email }}</td>
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; vertical-align: text-top;'>
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
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; vertical-align: text-top; width: 20%'>

                <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    @if (!$user->admin)
                    <button type="submit" id="para1" style="background: #e3342f; border-color: #e3342f;"
                        class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom"
                        onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    @endif
                </form>

                @if (!$user->admin)
                <form action="{{ route('user.permission', $user->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('PATCH')
                    @if($user->blogger && !$user->admin)
                    <button type="submit" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom"
                        onclick="return confirm('Are you sure you want to demote this user?');">Demote</button>
                    @elseif(!$user->blogger)
                    <button type="submit" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom"
                        onclick="return confirm('Are you sure you want to promote this user?');">Promote</button>
                    @endif
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if ($users->isEmpty())
<h4 class="text-center">No data in the table</h4>
@endif

@endsection