@extends('layouts.app')

@section('content')
    <style>
        .cardsContainer {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin: 0 auto;
            align-items: center;
            /* justify-content: space-evenly; */
        }

        .itemCard {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card_user {
            background-color: aqua;
        }

        .card_roles {
            background-color: rgb(76, 167, 34);
        }

        .card_request {
            background-color: rgb(194, 173, 80);
        }
    </style>
    <div class="container">
        {{-- <span>Users count: {{ count($users) }} users</span> --}}
        <div class="cardsContainer">
            <section class="itemCard">
                <div class="cardDetails">
                    <span>Users count: {{ count($users) }} users</span>
                </div>
            </section>
            <section class="itemCard">
                <div class="cardDetails">
                    <span>Roles count: {{ count($roles) }} users</span>
                </div>
            </section>
            <section class="itemCard">
                <div class="cardDetails">
                    <span>Requests count: {{ count($request) }} users</span>
                </div>
            </section>
        </div>
    </div>
@endsection
