@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline py-4 my-3">
    <h4>Messages</h4>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Name</th>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Email</th>
            <th style="text-align:center ;font-size: 0.95rem; font-weight: 600; color: #212529;" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
<<<<<<< HEAD
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>
                {{ $message->name }}</td>
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>
                {{ $message->email }}</td>
            <td
                style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>
                <form class="d-inline-block"> <a href="{{ route('messages.show', $message->id) }}"
                        style="vertical-align: middle;"
                        class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom">View</a></form>
                <form action="{{ route('messages.delete', $message->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="para1"
                        style="background: #e3342f; border-color: #e3342f;vertical-align: middle;"
                        class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom"
                        onclick="return confirm('Are you sure you want to delete {{ $message->name }}?');">Delete</button>
=======
            <td style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>{{ $message->name }}</td>
            <td style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>{{ $message->email }}</td>
            <td style='text-align:center ;font-family: inherit; font-size: 0.9rem; font-weight: 600; color:#495057; vertical-align: sub;'>
                <form class="d-inline-block" > <a href="{{ route('messages.show', $message->id) }}" style="vertical-align: middle;" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom" >View</a></form>
                <form action="{{ route('messages.delete', $message->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  id="para1" style="background: #e3342f; border-color: #e3342f;vertical-align: middle;" class="btncustom mb-2custom mb-md-0custom btn-primarycustom btn-blockcustom" onclick="return confirm('Are you sure you want to delete {{ $message->name }}?');" >Delete</button>
>>>>>>> 67a4fcfb7e46e3cf9d55edc4e47bee538bb942e6
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if ($messages->isEmpty())
<h4 class="text-center">No data in the table</h4>
@endif
@endsection