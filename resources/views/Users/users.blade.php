@extends('utilities.master')
@section('content')
    <style>
        .tableContainer {
            width: 85%;
            margin: 0 auto;
        }
    </style>
    <div class="tableContainer">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
