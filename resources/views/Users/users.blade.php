{{-- ALL USERS VIEW --}}
@extends('utilities.master')
@section('content')
    <style>
        .tableContainer {
            width: 85%;
            margin: 0 auto;
        }

        th,
        td {
            text-align: center;
        }

        .btn_container {
            display: flex;
            flex-direction: row-reverse;
            column-gap: 1.5rem;
            margin-top: 3rem;
        }


        .fa-trash,
        .fa-plus,
        .fa-pen-to-square {
            font-size: 2.8rem;
        }

        .btn_delete {
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

        .fa-plus {
            color: rgb(84, 230, 162);
        }

        .fa-pen-to-square {
            color: rgb(84, 164, 230);
        }

        .fa-trash:hover {
            scale: 1.3;
            color: rgb(177, 46, 46);
        }

        .fa-plus:hover {
            scale: 1.3;
            color: rgb(46, 177, 101);
        }

        .fa-pen-to-square:hover {
            scale: 1.3;
            color: rgb(46, 92, 177);
        }

        .actionsContainer {
            display: flex;
            flex-direction: column;
        }

        .statusIcon {
            font-size: 2rem;
        }
    </style>

    {{-- ALERTS --}}
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

    {{-- USERS DATA --}}
    <div class="tableContainer">
        <div class="btn_container">
            <!-- Trigger the modal with a button -->
            <button class="btnAction btn_delete" data-toggle="modal" data-target="#myModal">
                <i class="fa-solid fa-trash" id="deleteBtn"></i>
            </button>            
            <a href="{{ route('Users.create') }}" class="btnAction btn_create"><i class="fa-solid fa-plus"></i></a>
            <input hidden type="text" value="" id="idUser">
            <a class="btnAction btn_edit" id="editButton" onclick="editUser()"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
        <table class="table" id="UserTable">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr id="{{ $user->id }}" onclick="changeBG({{ $user->id }})">
                        <td>
                            @if ($user->status == true)
                                <i class="fa-solid fa-check statusIcon" style="color: #48b11b;"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-xmark statusIcon" style="color: #f27263;"></i>
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- @php($decryptedPassword = Crypt::decrypt($user->password)) --}}
                        <td>
                            <a href="">
                                <i class="fa-solid fa-calendar-week"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delet User</h4>
                </div>
                <div class="modal-body">
                    <p>are you secure to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/table.js"></script>
@endsection
