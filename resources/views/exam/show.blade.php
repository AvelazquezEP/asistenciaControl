@extends('layouts.app')

@section('content')
    <style>
        /* #region ACTION BUTTONS */
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

        .container-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* #endregion */


        .title-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .header {
            /* background-color: antiquewhite; */
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        .details {
            display: flex;
            justify-content: space-between;
        }

        .resource-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="row">
        <div class="">
            <div class="title-container">
                <div class="div-left">
                    <h2>Exam</h2>
                </div>
                <div class="div-right">
                    <a class="btn btn-primary" href="javascript:window.history.back();">Back</a>
                </div>
            </div>
            <input hidden type="text" name="id_exam" id="id_exam" value="{{ $exam->id }}">
            <p><b>Title: </b>{{ $exam->exam_name }}</p>
            <p><b>Description: </b>{{ $exam->description }}</p>
            <p><b>No. Questions: </b>{{ $exam->number_of_questions }}</p>

            <div class="btn_container">
                <input hidden type="text" value="{{ $exam->id }}" id="id">
                @can('category-delete')
                    <button class="btnAction btn_delete" data-toggle="modal" data-target="#myModal">
                        {{-- delete --}}
                        <i class="fa-solid fa-trash" id="deleteBtn"></i>
                    </button>
                @endcan
                @can('category-create')
                    {{-- <a href="{{ route('exam.create') }}" class="btnAction btn_create"> --}}
                    <a class="btnAction btn_create" id="createButton" onclick="createExamQuestion()">
                        {{-- create --}}
                        <i class="fa-solid fa-plus"></i>
                    </a>
                @endcan
                {{-- show --}}
                {{-- <a onclick="showExamItem()" class="btnAction btn_create" title="Show resource">
                    <i class="fa-solid fa-file" style="color: #2e73ea;"></i>
                </a> --}}
                @can('category-edit')
                    <a class="btnAction btn_edit" id="editButton" onclick="editExamQuestion()">
                        {{-- edit --}}
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                @endcan
            </div>
        </div>
    </div>
    <hr>
    <div class="header">
        <table class="table table-bordered" id="myTable">
            <tr>
                <th>Question</th>
                <th>Correct Answer</th>
            </tr>
            @foreach ($questions as $question)
                <tr id="{{ $question->id }}" onclick="changeBG({{ $question->id }})">
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->correct_answer }}</td>
                </tr>
            @endforeach
        </table>
        <div class="details">
        </div>
    </div>

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
                    <h4 class="modal-title">Delet Category</h4>
                </div>
                <div class="modal-body">
                    <p>are you secure to delete this Category?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="removeExamQuestion()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/table.js') }}"></script>
@endsection
