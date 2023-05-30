@extends('layouts.app')


@section('content')

    <style>
        .modulesContainer {
            display: flex;
            flex-direction: column;
        }

        .modules {
            margin-top: 4rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* align-items: center; */
            /* justify-content: start; */
            gap: 4rem;
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
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                        {{ $value->name }}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                {{-- @foreach ($permission as $value)
                    @foreach ($modules as $module)
                        @if ($value->module == $module)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                {{ $value->name }}
                            </label>
                            <br />
                        @endif
                    @endforeach
                @endforeach --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
