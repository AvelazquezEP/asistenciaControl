@extends('utilities.master')
@section('content')
    <style>
        .mainDiv {
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .cardContainer {
            padding-top: 4rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            max-width: 1224px;
            font-size: 3rem;
        }

        .cardItem {
            border-radius: 0.4rem;
            width: 20rem;
            height: 10rem;
            padding: 1.5rem;
            display: flex;
            justify-content: space-evenly;
            /* justify-items: center; */
            align-items: center;
        }

        .iconCard {
            width:
        }

        .iconDetails {
            font-size: 2.2rem;
            font-weight: 500;
        }

        .card_user {
            background-color: rgb(105, 192, 226);
        }
    </style>
    <div class="mainDiv">
        <section class="cardContainer">
            <div class="cardItem card_user">
                <div class="iconCard">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
                <div class="iconDetails">
                    <span>{{ $MAX }} users</span>
                </div>
            </div>
        </section>
    @endsection
