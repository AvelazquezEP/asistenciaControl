@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Exam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/exam/{{ $exam_id }}">Back</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        {{-- {{ route('products.update', $product->id) }} --}}
        <form action="{{ route('exam.update', $exam->id) }}" method="POST">
            @csrf
            <input hidden type="text" name="id_resource_exam" id="id_resource_exam" value="{{ $exam_id }}">
            <div class="form-group">
                <label for="exam_name">Title</label>
                <input type="text" name="exam_name" id="exam_name" class="form-control" value="{{ $exam->exam_name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ $exam->description }}" required>
            </div>
            <div class="form-group">
                <label for="number_of_questions">No. Questions</label>
                <input type="text" name="number_of_questions" id="number_of_questions"
                    value="{{ $exam->number_of_questions }}"
                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                    pattern="\d*" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save and update</button>
        </form>
    </div>
@endsection
