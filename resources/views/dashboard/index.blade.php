@extends('layouts.app')

@section('content')
    <div class="mainDiv">
        <section class="cardContainer">
            <div class="cardItem card_user">
                <div class="iconCard">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
                <div class="iconDetails">
                    <span>count: {{ $MAX }} users</span>
                </div>
            </div>
        </section>
    </div>
@endsection
