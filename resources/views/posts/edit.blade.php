@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mt-2">Edit Post</h2>
            </div>

            <div class="card-body text-center">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{ $post->title }}" name="title" class="form-control form-control-lg mb-3" placeholder="Post Title">

                <select name="cat_id" class="form-select form-control-lg mb-3">
                    <option value="{{ $post->cat_id }}">{{ $post->category->name }}</option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                <input type="file" name="image" class="form-control form-control-lg mb-3">
                <img src="{{ asset($post->image) }}" class="w-25" alt="">
                <textarea name="content" rows="4" class="form-control form-control-lg mb-3" placeholder="Post Content">{{ $post->content }}</textarea>
                <button type="submit" class="btn btn-primary btn-lg mt-3">Update Post</button>
            </form>
        </div> <!-- card-body -->

        </div> <!-- card -->
    </div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection
