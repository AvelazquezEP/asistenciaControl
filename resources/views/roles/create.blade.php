@extends('layouts.app')


@section('content')

    <style>
        .modulesContainer {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .modules {
            margin-top: 4rem;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 4rem;
        }

        .divider {
            width: 95%;
            height: .5rem;
            background-color: black
        }
    </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br />
                <div class="modules">
                    @foreach ($modules as $module)
                        <div class="modulesContainer">
                            <strong>{{ $module }}:</strong>
                            @foreach ($permission as $value)
                                @if ($value->module == $module)
                                    <label>
                                        {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                        {{ $value->name }}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class=""></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
