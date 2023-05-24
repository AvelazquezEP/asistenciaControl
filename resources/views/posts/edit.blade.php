@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Show this post in the Welcome section</label>
                </br>
                @if ($post->status == true)
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
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="picture">picture</label>
                <input type="file" accept=".png,.jpg" name="picture" id="picture" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ $post->description }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save and publish</button>
        </form>
        {{-- <hr> --}}
    </div>
@endsection
