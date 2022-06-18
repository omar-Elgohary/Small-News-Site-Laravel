@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mt-2">All Categories</h2>
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
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($categories as $key => $category)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $category->name }}</td>
                <td class="text-center"><a href="{{ route('category.edit' , ['id' => $category->id]) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                <td class="text-center"><a href="{{ route('category.destroy' , ['id' => $category->id]) }}"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    </div> <!-- card-body -->

        </div> <!-- card -->
    </div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection
