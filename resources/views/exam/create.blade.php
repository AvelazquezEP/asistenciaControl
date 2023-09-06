@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create a new Exam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/exam/{{ $exam_id }}">Back</a>
                {{-- <a class="btn btn-primary" href="{{ route('exam.index') }}">Back</a> --}}
            </div>
        </div>
    </div>

    <div class="form-group">
        {{-- <form action="{{ route('exam.store') }}" method="POST"> --}}
        <form action="/exam/store" method="POST">
            @csrf
            <input hidden type="text" name="id_resource_exam" id="id_resource_exam" value="{{ $exam_id }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="exam_name" id="exam_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Description">No. Questions</label>
                {{-- <input type="text" name="number_of_questions" id="number_of_questions" class="form-control" required> --}}
                <input type="text"
                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                    class="form-control" placeholder="No." name="number_of_questions" id="number_of_questions"
                    size="20" pattern="\d*" maxlength="2" required />
            </div>
            <button type="submit" class="btn btn-primary">Save and create</button>
        </form>
        <hr>
    </div>
@endsection
