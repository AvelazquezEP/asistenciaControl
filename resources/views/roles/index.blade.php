@extends('layouts.app')


@section('content')
    <style>
        .btn_container {
            display: flex;
            flex-direction: row-reverse;
            padding-bottom: 1rem;
            column-gap: 1rem;
        }

        i {
            font-size: 2.8rem;
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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ $message }}</strong>.
        </div>
    @endif

    <div class="alert alert-danger" id="dangerAlertEdit">
        <a class="close" onclick="close_dangerAlert('dangerAlertEdit')">&times;</a>
        <strong>
            You need to select a record to edit !!
        </strong>
    </div>

    <div class="btn_container">
        <input hidden type="text" value="" id="id">
        @can('role-delete')
            <button class="btnAction btn_delete" data-toggle="modal" data-target="#myModal">
                {{-- delete --}}
                <i class="fa-solid fa-trash" id="deleteBtn"></i>
            </button>
        @endcan
        @can('role-create')
            <a href="{{ route('roles.create') }}" class="btnAction btn_create">
                {{-- create --}}
                <i class="fa-solid fa-plus"></i>
            </a>
        @endcan
        @can('role-edit')
            <a class="btnAction btn_edit" id="editButton" onclick="editRole()">
                {{-- edit --}}
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        @endcan
    </div>

    <table class="table table-bordered" id="myTable">
        <tr>
            <th>No</th>
            <th>Name</th>
            {{-- <th width="280px">Action</th> --}}
        </tr>
        @foreach ($roles as $key => $role)
            <input hidden type="text" value="{{ $role->id }}">
            <tr id="{{ $role->id }}" onclick="changeBG({{ $role->id }})">
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
            </tr>
        @endforeach
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="alert alert-danger" id="dangerAlertDelete">
                <a class="close" onclick="close_dangerAlert('dangerAlertDelete')">&times;</a>
                <strong>
                    You need to select a record to Delete !!
                </strong>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delet Role</h4>
                </div>
                <div class="modal-body">
                    <p>are you secure to delete this Role?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteRole()">Delete</button>
                    {{-- <form class="form" action="{{ route('Users.deleted_ok', [$user->id]) }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/table.js') }}"></script>
@endsection
