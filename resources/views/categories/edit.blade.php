@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mt-2">Edit Category</h2>
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

            <form action="{{ route('category.update', ['id'=>$category->id]) }}" method="post">
                @csrf
                <input type="text" value="{{ $category->name }}" name="name" class="form-control form-control-lg" placeholder="Category Name">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Update Category</button>
            </form>
        </div> <!-- card-body -->

        </div> <!-- card -->
    </div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection
