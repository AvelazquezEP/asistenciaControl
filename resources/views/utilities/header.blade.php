<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>

<body>

    <ul>
        <li><a href="{{ route('welcome') }}">Home</a></li>
        <li><a href="{{ route('Users.users') }}">Users</a></li>
        {{-- <li><a href="#">Otros</a></li> --}}
        {{-- {{-- <li><a href="{{ route('admin.create') }}">Create topic</a></li> --}}
        {{-- <li><a href="{{ route('admin.edit') }}">Edit topic</a></li>
        <li><a href="{{ route('admin.delete') }}">Delete</a></li>
        <li style="float:right"><a class="active" href="{{ route('other.about') }}">About</a></li> --}} --}}
    </ul>

</body>

</html>
