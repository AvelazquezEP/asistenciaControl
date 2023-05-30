@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create a new Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- <h2>Image Upload</h2> --}}
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="file" accept=".png,.jpg" name="icon" id="icon" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" id="Description" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save and publish</button>
        </form>
        <hr>
    </div>
@endsection
