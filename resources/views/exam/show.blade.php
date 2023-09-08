@extends('layouts.app')

@section('content')
    <style>
        .title-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .header {
            background-color: antiquewhite;
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
            <input hidden type="text" name="id" id="id" value="{{ $exam->id }}">
            <p><b>Title: </b>{{ $exam->exam_name }}</p>
            <p><b>Description: </b>{{ $exam->description }}</p>
            <p><b>No. Questions: </b>{{ $exam->number_of_questions }}</p>
            <a class="btn btn-primary" onclick="createExamQuestion()">Add question</a>
        </div>
    </div>
    <hr>
    <div class="header">
        <div class="details">

        </div>
    </div>

    <script src="{{ asset('js/table.js') }}"></script>
@endsection
