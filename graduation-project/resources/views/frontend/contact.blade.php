@extends('layouts.app')

@section('content')
<div class="container form">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact US</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required
                                    autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required
                                    autocomplete=" email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Message</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="message" id="message" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection