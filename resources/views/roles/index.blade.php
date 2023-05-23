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
            {{ $message }}
        </div>
    @endif

    <div class="btn_container">
        <button class="btnAction btn_delete" data-toggle="modal" data-target="#myModal">
            <i class="fa-solid fa-trash" id="deleteBtn"></i>
        </button>
        {{-- <a href="#" class="btnAction btn_delete"><i class="fa-solid fa-trash" id="deleteBtn"></i></a> --}}
        <a href="{{ route('roles.create') }}" class="btnAction btn_create"><i class="fa-solid fa-plus"></i></a>
        <input hidden type="text" value="" id="id">
        <a class="btnAction btn_edit" id="editButton" onclick="editRole()"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

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
                    <button type="button" class="btn btn-danger" onclick="deleteRole()">Delete</button>
                    {{-- <form class="form" action="{{ route('Users.deleted_ok', [$user->id]) }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/table.js') }}"></script>

    {{-- {!! $roles->render() !!} --}}
@endsection
