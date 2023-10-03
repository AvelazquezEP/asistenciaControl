@extends('layouts.app')

@section('content')
    <?php $id_user_test = Session::get('id_user_test'); ?>
    <p>{{ $id_user_test }}</p>
@endsection
