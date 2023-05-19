{{-- CREATE NEW USER --}}
@extends('utilities.master')
@section('content')
    <style>
        .form {
            width: 80%;
            margin: 0 auto;
            padding-top: 3rem;
        }

        .radioContainer {
            display: flex;
            gap: 2rem;
        }

        .radioButtonStatus {
            display: flex;
            align-items: center;
            align-content: center;
        }
    </style>
    <form class="form" method="POST" action="{{ route('Users.insert_ok') }}">
        @csrf
        <!-- {{ csrf_field() }} -->
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
