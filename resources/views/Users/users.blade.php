{{-- ALL USERS VIEW --}}
@extends('utilities.master')
@section('content')
    <style>
        .tableContainer {
            width: 85%;
            margin: 0 auto;
        }
    </style>

    @if (Session::has('updated'))
        <div class="alert-wrap">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-check"></i> <strong>Success!</strong> {{ Session::get('updated') }}
            </div>
        </div>
    @endif
    <div class="tableContainer">
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
                            <a href="{{ url('user/' . $user->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
