@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- <h2>Image Upload</h2> --}}
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">enable this category?</label>
                </br>
                @if ($category->status == true)
                    <input type="radio" name="status" id="status" class="" value="true" checked>
                    <label for="">Yes</label>
                    <input type="radio" name="status" id="status" class="" value="false">
                    <label for="">No</label>
                @else
                    <input type="radio" name="status" id="status" class="" value="true">
                    <label for="">Yes</label>
                    <input type="radio" name="status" id="status" class="" value="false" checked>
                    <label for="">No</label>
                @endif
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="file" accept=".png,.jpg" name="icon" id="icon" class="form-control">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" id="Description" class="form-control"
                    value="{{ $category->Description }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save and publish</button>
        </form>
        <hr>
    </div>
@endsection
