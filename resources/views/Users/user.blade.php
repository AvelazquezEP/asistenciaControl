{{-- EDIT USER VIEW --}}
@extends('utilities.master')
@section('content')
    <style>
        .form {
            width: 80%;
            margin: 0 auto;
            padding-top: 3rem;
        }
    </style>
    <form class="form" action="{{ route('Users.update_ok', [$user->id]) }}">
        <input hidden type="text" value="{{ $user->id }}">
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" value="{{ $user->password }}">
        </div>
        <button type="submit" class="btn btn-default">Update</button>
    </form>
@endsection