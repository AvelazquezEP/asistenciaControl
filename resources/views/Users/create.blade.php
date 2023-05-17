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
        {{-- <input hidden type="text" value="{{ $user->id }}"> --}}
        @csrf <!-- {{ csrf_field() }} -->
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
    </form>
@endsection
