@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create a new Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('exams.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <form action="{{ route('exams.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Status</label>
                <input type="radio" name="status" id="status" value="true" checked>
                <label for="">True</label>
                <input type="radio" name="status" id="status" value="false">
                <label for="">False</label>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="type_category" id="type_category" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Description">Department</label>
                <input type="text" name="department" id="department" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save and publish</button>
        </form>
        <hr>

        {{-- @csrf
        <div class="form-group">
            <label for="title">Do you want to show this category to another users?</label>
            </br>
            @if ($category->status == true)
                <input type="radio" name="status" id="status" value="true" checked>
                <label for="">Yes</label>
                <input type="radio" name="status" id="status" value="false">
                <label for="">No</label>
            @else
                <input type="radio" name="status" id="status" value="true">
                <label for="">Yes</label>
                <input type="radio" name="status" id="status" value="false" checked>
                <label for="">No</label>
            @endif
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="type_category" id="type_category" class="form-control" value="{{ $category->type }}"
                required>
        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" name="description" id="description" class="form-control"
                value="{{ $category->description }}" required>
        </div>

        <div class="form-group">
            <label for="Description">Department</label>
            <input type="text" name="department" id="department" class="form-control" value="{{ $category->department }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button> --}}
    </div>
@endsection
