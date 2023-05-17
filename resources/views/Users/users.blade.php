{{-- ALL USERS VIEW --}}
@extends('utilities.master')
@section('content')
    <style>
        .tableContainer {
            width: 85%;
            margin: 0 auto;
        }

        .btn_container {
            display: flex;
            flex-direction: row-reverse;
            column-gap: 1rem;
        }

        .btn_create {
            /* padding: 3rem; */
            background-color: rgb(78, 145, 62);
            color: white;
            padding: 0.8rem;
            border-radius: 0.4rem;
            margin-top: 5rem;
            font-weight: 500;
            /* padding: 1rem 3rem; */
        }

        .btn_create::hover {
            background-color: rgb(121, 185, 105);
        }
    </style>

    @if (Session::has('created'))
        <div class="alert-wrap">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-check"></i> <strong>Success!</strong> {{ Session::get('created') }}
            </div>
        </div>
    @endif
    @if (Session::has('updated'))
        <div class="alert-wrap">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-check"></i> <strong>Success!</strong> {{ Session::get('updated') }}
            </div>
        </div>
    @endif
    @if (Session::has('deleted'))
        <div class="alert-wrap">
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-times"></i> <strong>Deleted</strong> {{ Session::get('deleted') }}
            </div>
        </div>
    @endif
    <div class="tableContainer">
        <div class="btn_container">
            {{-- <a href="{{ route('Users.create') }}" class="btn_create">Remove</a> --}}
            <a href="{{ route('Users.create') }}" class="btn_create">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <input hidden type="text" value="{{ $user->id }}">
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <form class="form" method="POST" action="{{ route('Users.deleted_ok', [$user->id]) }}">
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ url('edit/' . $user->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
