@extends('layouts.app')

@section('content')
    <style>
        /* ACTIONS */
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

        /* CARD ITEMS*/
        .containerCategory {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            row-gap: 6rem;
            align-items: center;
            padding: 1rem;
        }

        .itemCategory {
            border-radius: 0.8rem;
            box-shadow: -2px -2px 1.5rem #575757;
            height: 100px;
            width: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 1rem;
        }

        .iconContainer>img {
            height: 100px;
        }

        .start-container {
            background-color: none;
        }

        .start-icon {
            background-color: none;
        }

        .action-container {
            background-color: none;
        }
    </style>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ $message }}</strong>
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
        {{-- show --}}
        <a onclick="exam_details()" class="btnAction btn_create" title="review question">
            <i class="fa-solid fa-file" style="color: #2e73ea;"></i>
        </a>
        <a onclick="final_result()" class="btnAction btn_create" title="Review all question">
            <i class="fa-solid fa-square-poll-vertical" style="color: #2e73ea;"></i>
        </a>
    </div>

    <table class="table table-bordered" id="myTable">
        <tr>
            <th>Control Number</th>
            <th>Name</th>
            <th>Department</th>
        </tr>
        @foreach ($user_exams as $key => $exam_user)
            <tr id="{{ $exam_user->id }}" onclick="changeBG({{ $exam_user->id }})">
                <input hidden type="text" value="{{ $exam_user->id }}">
                <td>{{ $exam_user->control_number }}</td>
                <td>{{ $exam_user->user_name }}</td>
                <td>{{ $exam_user->department }}</td>
            </tr>
        @endforeach
    </table>

    <script src="{{ asset('js/table.js') }}"></script>
@endsection
