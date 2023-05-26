@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create a new Resource</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('resources.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- <h2>Image Upload</h2> --}}
        <form action="{{ route('resource.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="resource_file">Resource File</label>
                <input type="file" accept=".png,.jpg,.pdf " name="resource_file" id="resource_file"
                    class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <hr>
    </div>
@endsection
