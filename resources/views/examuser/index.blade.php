@extends('layouts.app')

@section('content')
    <style>
        .title {
            text-align: center;
        }

        .questions_number {
            font-size: 1.5rem;
        }

        .details {
            font-size: 1.5rem;
            font-weight: 500;
        }
    </style>

    <div class="container">
        <h2 class="title">{{ $exam->exam_name }}</h2>
        <p class="questions_number"><b>Total questions:</b> {{ $exam->number_of_questions }}</p>

        <p class="details">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel optio suscipit dolore ipsa,
            repudiandae asperiores
            accusamus nobis ipsam dicta repellendus magnam alias velit exercitationem maxime veniam nulla ex repellat unde!
        </p>

        <form action="/examuser/store/{{ $exam->id }}" method="POST">
            @csrf
            <input hidden type="text" name="exam_id" id="exam_id" value="{{ $exam->id }}">
            <input hidden type="text" name="exam_name" id="exam_name" value="{{ $exam->id }}">

            <div class="form-group">
                <label for="user_name">Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="control_number">Control number</label>
                <input type="text" name="control_number" id="control_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="department">Deparment</label>
                <input type="text" name="department" id="department" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Start</button>
        </form>
    </div>
@endsection
