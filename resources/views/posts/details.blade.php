@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">{{ $post->title }}</h2>
            </div>

            <div class="card-body text-center">
                <img src="{{ asset($post->image) }}" class="w-75 mb-4" alt="">
                <p class="lead">{{ $post->content }}</p>
        </div> <!-- card-body -->

        <div class="card-footer text-center">
            <a href="{{ route('posts') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> All Posts</a>
        </div> <!-- card-footer -->

        </div> <!-- card -->
    </div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection
