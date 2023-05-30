@extends('layouts.app')

@section('content')
    <style>
        .header {
            background-color: antiquewhite;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        .details {
            display: flex;
            justify-content: space-between;
        }

        .resource_container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Resource</h2>
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('resources.index') }}"> Back</a> --}}
                <a class="btn btn-primary" href="javascript:window.history.back();">Back</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="header">
        <div class="details">
            <div>
                <P><b>Title: </b>{{ $resource->title }}</P>
                <P><b>Type: </b>{{ $resource->extension_resource }}</P>
                <P><b>Description:</b> {{ $resource->description }}</P>
            </div>
            <div>
                <P><b>Date: </b>{{ $resource->created_at->toDateString() }}</P>
                <P><b>Last Update: </b>{{ $resource->created_at->toDateString() }}</P>
            </div>
        </div>
    </div>
    <div class="resource_container">
        @if ($resource->extension_resource == 'pdf')
            {{-- <p>{{ $data }}</p> --}}
            <embed src="data:application/pdf;base64,{{ $resource->resource_file }}" type="application/pdf" width="100%"
                height="900px" />
        @elseif ($resource->extension_resource == 'png' || $resource->extension_resource == 'jpg')
            <img src="data:image/png;base64,{{ $resource->resource_file }}" alt="Picture" style="max-width: 100%;">
        @else
            {{-- <strong class="danger"></strong> --}}
            <div class="alert alert-danger">
                {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
                <strong>OPPS, something has happened and the resource cannot be shown</strong>.
            </div>
        @endif
    </div>
@endsection
