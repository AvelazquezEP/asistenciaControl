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

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $user->name }}</h2>
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('resources.index') }}"> Back</a> --}}
                <a class="btn btn-primary" href="javascript:window.history.back();">Back</a>
            </div>
        </div>
    </div>

    <div class="">
        {{-- <p></p> --}}
        {{-- <button onclick="open_all_alerts()">Test Alert</button> --}}
        <form action="{{ route('scheduler.create', 1) }}" method="POST" class="timeForm">
            @csrf
            {{-- B1 --}}
            <div class="form-group">
                <label>b1</label>

                <div class="alert alert-danger" id="b1Alert">
                    {{-- <a class="close" onclick="close_dangerAlert('b1Alert')">&times;</a> --}}
                    <strong id="b1Msg"></strong>
                </div>

                <div class="timeContainer">
                    <input type="time" name="time_start" id="b1_time_start" class="form-control" required>
                    <input type="time" name="time_finish" id="b1_time_finish" class="form-control" required
                        onchange="b1_validate()">
                </div>
            </div>
            {{-- B2 --}}
            <div class="form-group">
                <label>b2</label>

                <div class="alert alert-danger" id="b2Alert">
                    {{-- <a class="close" onclick="close_dangerAlert('b2Alert')">&times;</a> --}}
                    <strong id="b2Msg"></strong>
                </div>

                <div class="timeContainer">
                    <input type="time" name="time_start" id="b2_time_start" class="form-control" required
                        onchange="b2_validate()">
                    <input type="time" name="time_finish" id="b2_time_finish" class="form-control" required
                        onchange="b2_validate()">
                </div>
            </div>
            {{-- LNC --}}
            <div class="form-group">
                <label>lnc</label>

                <div class="alert alert-danger" id="lncAlert">
                    {{-- <a class="close" onclick="close_dangerAlert('lncAlert')">&times;</a> --}}
                    <strong id="lncMsg"></strong>
                </div>

                <div class="timeContainer">
                    <input type="time" name="time_start" id="lnc_time_start" class="form-control" required
                        onchange="lnc_validate()">
                    <input type="time" name="time_finish" id="lnc_time_finish" class="form-control" required
                        onchange="lnc_validate()">
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/scheduler.js') }}"></script>
@endsection
