@extends('layouts.app')

@section('content')
    <style>
        .gridPost {
            height: 90vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            justify-content: center;
            align-items: center;
            gap: 1.3rem;
        }

        .postItem {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            width: 95%;
            height: 100%;
        }

        .postImage {
            max-width: 100%;
            height: 100%;
        }

        .dateResource {
            color: gray;
            font-weight: 600;
        }

        @media screen and (max-width: 900px) {
            .gridPost {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
    <div class="gridPost">
        {{-- <small>test</small> --}}
        @foreach ($posts as $post)
            <div class="postItem">
                <img src="data:image/png;base64,{{ $post->picture }}" alt="Picture" class="postImage">
                <span id="postDate" class="dateResource">{{ $post->created_at->toDateString() }}</span>
            </div>
        @endforeach
        {{-- <h2>Item #1</h2>
        <h3>Item #2</h2> --}}
    </div>
@endsection
