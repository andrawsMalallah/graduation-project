@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-baseline pt-3 pb-4">
    <h5>Sliders</h5>
    <a type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modal">
        Add a slider
    </a>
</div>

@error('image')
<p class="text-center p-2 text-white error">{{ $message }}</p>
@enderror

<table class="table">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sliders as $slider)
        <tr>
            <td>
                <img src="{{ asset($slider->image) }}" alt="Slide" class="slider">
            </td>
            <td>
                <a href="{{ route('slider.show', $slider->id) }}" class="btn btn-sm btn-primary">View</a>
                <form action="{{ route('sliders.delete', $slider->id) }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add new slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02"
                                aria-describedby="inputGroupFileAddon02">Choose
                                file</label>
                                
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection