@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mt-2">All Posts</h2>
            </div>

            <div class="card-body text-center">

            @if (session('message'))
                <div class="alert alert-success text-center">
                    <h2>{{ session('message') }}</h2>
                </div>
            @endif

    <table class="table table-bordered table-striped teble-responsive">

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><img src="{{ $post->image }}" height="60" alt=""></td>
                <td class="text-center"><a href="{{ route('post.show' , ['id' => $post->id]) }}"><i class="fa fa-eye fa-lg"></i></a></td>
                <td class="text-center"><a href="{{ route('post.edit' , ['id' => $post->id]) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                <td class="text-center"><a href="{{ route('post.destroy' , ['id' => $post->id]) }}"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="mx-auto">{{ $posts->links() }}</div>

    </div> <!-- card-body -->

        </div> <!-- card -->
    </div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection
