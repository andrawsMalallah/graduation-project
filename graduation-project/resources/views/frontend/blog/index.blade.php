@extends('layouts.app')

@section('content')
<style>
.blogs-section{
    width: 100%;
    padding: 50px 5vw;
    display: flex;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 80px;
}

.blog-image{
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.blog-overview{
    margin: 10px 0 20px;
    line-height: 30px;
}

.btn.dark{
    background: #1b1b1b;
    color: #fff;
}

</style>

<section class="container py-4 ">
    <span >
        <h2 style="text-align:center" class="ml-2">Blog</h2>
        @auth
        @if (Auth::user()->admin || Auth::user()->blogger)
            <a class="text-secondary ml-2" data-toggle="modal" data-target="#Modal">
                Create new post
            </a>
        @endif
        @endauth
    </span>


    <div class="pt-3 mt-5 mx-auto">
        @foreach ($posts as $post)
        @if ($post->approved)
        <div class="post mb-5 mx-auto">
            <img src="{{ asset($post->image) }}" class="mx-auto mb-3 rounded" alt="">
            <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-dark"><h4 class="post-title">{{ $post->title }}</h4></a maxlength="30" >
            {!! \Str::limit($post->description, 30) !!} </a>

            <h6 class="font-weight-bold mt-2">{{
                \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</h6>
            <hr>
        </div>
        @endif
        @endforeach
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Create New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <input class="form-control mx-3" name="title" required placeholder="Post Title"/>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" required name="image" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-md-right">Description</label>
                        <div class="">
                            <textarea class="form-control" required rows="3" name="description"
                                id="my-editor"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/ckeditor/ckeditor.js"></script>
<script>
    if (document.getElementById('my-editor')) {
        CKEDITOR.replace('my-editor');
    }
</script>
@endsection