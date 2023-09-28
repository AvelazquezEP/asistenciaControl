@extends('layouts.app')

@section('content')
    <?php $id_user = Session::get('id_user'); ?>
    <p>{{ $id_user }}</p>
@endsection
