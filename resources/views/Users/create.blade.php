{{-- CREATE NEW USER --}}
@extends('utilities.master')
@section('content')
    <style>
        .form {
            width: 80%;
            margin: 0 auto;
            padding-top: 3rem;
        }
    </style>
    <form class="form" method="POST" action="{{ route('Users.insert_ok') }}">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="form-group">
            <label>Status:</label>
            <label for="true">True</label><br>
            <input type="radio" id="true" name="status_user" value="true">
            <label for="css">False</label><br>
            <input type="radio" id="false" name="status_user" value="false">
        </div>
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-default">Create</button>
        <a class="btn btn-danger" href="{{ url('/users') }}">Cancel</a>
    </form>
@endsection
