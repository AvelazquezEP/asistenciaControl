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
        {{-- <button onclick="validate_all()">Test Alert</button> --}}
        <form action="{{ route('scheduler.store') }}" method="POST" class="timeForm" id="formTime">
            @csrf
            <input hidden type="text" value="{{ $user->id }}" id="id" name="id_user">
            <div class="form-group">
                <label>b1</label>

                <div class="alert alert-danger" id="b1Alert">
                    <strong id="b1Msg"></strong>
                </div>

                <div class="timeContainer">
                    <input type="time" name="b1_time_start" id="b1_time_start" class="form-control"
                        onchange="b1_validate('b1_time_start')">
                    <input type="time" name="b1_time_finish" id="b1_time_finish" class="form-control"
                        onchange="b1_validate('b1_time_finish')">
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
                    <input type="time" name="b2_time_start" id="b2_time_start" class="form-control"
                        onchange="b2_validate('b2_time_start')">
                    <input type="time" name="b2_time_finish" id="b2_time_finish" class="form-control"
                        onchange="b2_validate('b2_time_finish')">
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
                    <input type="time" name="lnc_time_start" id="lnc_time_start" class="form-control"
                        onchange="lnc_validate('lnc_time_start')">
                    <input type="time" name="lnc_time_finish" id="lnc_time_finish" class="form-control"
                        onchange="lnc_validate('lnc_time_finish')">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
        {{-- <button class="btn btn-primary" onclick="test()">Save</button> --}}
    </div>

    <script src="{{ asset('js/scheduler.js') }}"></script>
@endsection
