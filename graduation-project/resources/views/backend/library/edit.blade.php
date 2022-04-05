@extends('layouts.dashboard')

@section('content')
<div class="mt-4">
    <h2 class="text-center">{{ $library->name }}</h2>
    <div class="underline"></div>

    <form action="{{ route('library.update', $library->id) }}" method="post" enctype="multipart/form-data" class="py-4">
        @csrf
        @method('PATCH')
        
                <div class="form-group">
                    <label class="col-form-label text-md-right">Name</label>
                    <div class="row">
                        <input class="form-control mx-3" name="name" required value="{{ $library->name }}" />
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label text-md-right">Department</label>
                    <select class="custom-select" name="department" required>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $library->department_id ? 'selected'
                            : '' }}>{{
                            $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="col-form-label text-md-right">Stage</label>
                <select class="custom-select" required name="stage">
            
                    <option value="First Stage" {{ $library->stage === 'First Stage' ? 'selected' : ''}}>First Stage</option>
                    <option value="Second Stage" {{ $library->stage === 'Second Stage' ? 'selected' : ''}}>Second Stage</option>
                    <option value="Third Stage" {{ $library->stage === 'Third Stage' ? 'selected' : ''}}>Third Stage</option>
                    <option value="Fourth Stage" {{ $library->stage === 'Fourth Stage' ? 'selected' : ''}}>Fourth Stage</option>
                </select>
                @error('stage')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <label class="col-form-label text-md-right">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="validatedInputGroupCustomFile">
                        <label class="custom-file-label" for="validatedInputGroupCustomFile">Change Image</label>
                    </div>
                
                    <div class="input-group-append">
                        <a href="{{ route('library.image.view', $library->id) }}" target="_blank"
                            class="btn btn-outline-secondary rounded ml-2" type="button">View</a>
                    </div>
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group mt-3">
                    <label class="col-form-label text-md-right">Link</label>
                    <div class="row">
                        <input class="form-control mx-3" name="link" required value="{{ $library->link }}" />
                    </div>
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

         
        
        <a href="{{ route('dashboard.library') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection