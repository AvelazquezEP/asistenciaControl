@extends('layouts.app')


@section('content')
    {{-- <input hidden type="text" id="idUser"> --}}
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div> --}}

    <style>
        .btn_container {
            display: flex;
            flex-direction: row-reverse;
            padding-bottom: 1rem;
            column-gap: 1rem;
        }

        i {
            font-size: 2rem;
            text-decoration: none;
            background-color: white;
        }

        button,
        input[type="submit"],
        input[type="reset"] {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }

        .fa-trash {
            color: rgb(230, 84, 84);
        }

        .fa-trash:hover {
            scale: 1.3;
            color: rgb(177, 46, 46);
        }

        .fa-plus {
            color: rgb(84, 230, 162);
        }

        .fa-plus:hover {
            scale: 1.3;
            color: rgb(46, 177, 101);
        }

        .fa-pen-to-square {
            color: rgb(84, 164, 230);
        }

        .fa-pen-to-square:hover {
            scale: 1.3;
            color: rgb(46, 92, 177);
        }
    </style>

    <div class="btn_container">
        <!-- Trigger the modal with a button -->
        {{-- <button class="btnAction btn_delete" data-toggle="modal" data-target="#myModal"> --}}
        <button class="btnAction btn_delete" onclick="openModal()">
            <i class="fa-solid fa-trash" id="deleteBtn"></i>
        </button>
        {{-- <a href="#" class="btnAction btn_delete"><i class="fa-solid fa-trash" id="deleteBtn"></i></a> --}}
        <a href="{{ route('users.create') }}" class="btnAction btn_create"><i class="fa-solid fa-plus"></i></a>
        <input hidden type="text" value="" id="idUser">
        <a class="btnAction btn_edit" id="editButton" onclick="editUser()"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <!-- Modal -->
    <div hidden id="myModal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()">&times;</button>
                <h4 class="modal-title">Delet User</h4>
            </div>
            <div class="modal-body">
                <p>are you secure to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
            </div>
        </div>
    </div>


    <table class="table table-bordered" id="userTable">
        <tr>
            {{-- <th>No</th> --}}
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            {{-- <th width="280px">Action</th> --}}
        </tr>
        @foreach ($data as $key => $user)
            <input hidden type="text" value="{{ $user->id }}">
            <tr id="{{ $user->id }}" onclick="changeBG({{ $user->id }})">
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                {{-- <td>
                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td> --}}
            </tr>
        @endforeach
    </table>

    <!-- Trigger/Open The Modal -->
    {{-- <button id="myBtn">Open Modal</button> --}}

    <!-- The Modal -->
    {{-- <div hidden id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&amp;times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div> --}}

    <script src="{{ asset('js/table.js') }}"></script>
@endsection
