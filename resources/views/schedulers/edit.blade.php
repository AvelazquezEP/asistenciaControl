@extends('layouts.app')

@section('content')
    <style>
        .timeForm {
            display: flex;
            flex-direction: column;
            row-gap: 5rem;
        }

        .timeContainer {
            display: flex;
            column-gap: 6rem;
            margin-top: 1rem;
        }
    </style>

    <div class="alert alert-danger" id="mainAlert">
        <strong id="mainMsg"></strong>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>{{ $user->name }}</h2>
            </div> --}}
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('resources.index') }}"> Back</a> --}}
                <a class="btn btn-primary" href="javascript:window.history.back();">Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('scheduler.update', $userId) }}" method="POST" class="timeForm" id="formTime">
        @csrf
        <input hidden type="text" value="{{ $userId }}" id="id" name="id_user">
        @if (count($data) > 0)
            @foreach ($data as $item)
                <input hidden type="text" value="{{ $item->scheduler_id }}" id="scheduler_id"
                    name="scheduler_id_{{ $item->type }}">
                <div class="form-group">
                    <label>{{ $item->type }}</label>

                    <div class="alert alert-danger" id="{{ $item->type }}Alert">
                        <strong id="{{ $item->type }}Msg"></strong>
                    </div>

                    <div class="timeContainer">
                        {{-- <input type="time" name="b1_time_start" id="b1_time_start" class="form-control" --}}
                        <input type="time" name="{{ $item->type }}_time_start" id="{{ $item->type }}_time_start"
                            class="form-control" onchange="{{ $item->type }}_validate('{{ $item->type }}_time_start')"
                            value="{{ date('G:i', strtotime($item->time_start)) }}">
                        <input type="time" name="{{ $item->type }}_time_finish" id="{{ $item->type }}_time_finish"
                            class="form-control"
                            onchange="{{ $item->type }}_validate('{{ $item->type }}_time_finish')"
                            value="{{ date('G:i', strtotime($item->time_finish)) }}">
                    </div>
                </div>
            @endforeach
        @else
            <div>
                <strong>
                    There is no registered schedule for this user.
                </strong>
            </div>
        @endif
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>

    <script src="{{ asset('js/scheduler.js') }}"></script>
@endsection
