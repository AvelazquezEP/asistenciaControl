{{-- EDIT USER VIEW --}}
@extends('utilities.master')
@section('content')
    <style>
        .form {
            width: 80%;
            margin: 0 auto;
            padding-top: 3rem;
        }

        .backButton>svg {
            width: 2rem;
        }
    </style>
    {{-- <a href="index.html" class="backButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
        </svg>
        <span class="">
            back
        </span>
    </a> --}}
    <form class="form" method="POST" action="{{ route('Users.update_ok', [$user->id]) }}">
        @csrf
        <!-- {{ csrf_field() }} -->
        <input hidden type="text" value="{{ $user->id }}">
        <div class="form-group">
            <div class="radioContainer">
                <label>Status:</label>
                @if ($user->status == true)
                    <div class="radioButtonStatus">
                        <input type="radio" id="status" name="status" value="true" checked>
                        <label for="true">True</label>
                    </div>
                    <div class="radioButtonStatus">
                        <input type="radio" id="status" name="status" value="false">
                        <label for="false">false</label>
                    </div>
                @else
                    <div class="radioButtonStatus">
                        <input type="radio" id="status" name="status" value="true">
                        <label for="true">True</label>
                    </div>
                    <div class="radioButtonStatus">
                        <input type="radio" id="status" name="status" value="false" checked>
                        <label for="false">false</label>
                    </div>
                @endif
            </div>
        </div>
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
            <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}">
        </div>
        <button type="submit" class="btn btn-default">Update</button>
        <a class="btn btn-danger" href="{{ url('/users') }}">Cancel</a>
    </form>
@endsection
