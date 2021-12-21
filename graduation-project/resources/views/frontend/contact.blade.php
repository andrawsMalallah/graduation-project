@extends('layouts.app')

@section('links')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content')
<div class="container form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow px-3">
                <h3 class="text-center py-4">Contact US</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="form-group ">

                            <div class="">
                                <input id="name" type="text" class="form-control py-4 mb-4" name="name" required
                                    autocomplete="name" autofocus placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <input id="email" type="email" class="form-control py-4 mb-4" name="email" required
                                    autocomplete=" email" autofocus placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <textarea class="form-control" name="message" id="message" placeholder="Message"
                                    required rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary w-100 my-2">
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

@section('script')
<script>
    @if(Session::has('message'))
        toastr.options =
        {
        "closeButton" : true,
        }
            toastr.success("{{ session('message') }}");
        @endif
    
        @if(Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        }
            toastr.error("{{ session('error') }}");
        @endif
    
        @if(Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        }
            toastr.info("{{ session('info') }}");
        @endif
    
        @if(Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>
@endsection