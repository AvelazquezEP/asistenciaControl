@extends('layouts.app')

@section('content')
    <style>
        .gridPost {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-content: center;
            align-items: center;
            gap: 1.3rem;
        }

        .postItem {
            margin: 0 auto;
            width: 95%;
        }
    </style>
    <div class="gridPost">
        {{-- <small>test</small> --}}
        @foreach ($posts as $post)
            <div class="postItem">
                <span id="postDate">{{ $post->created_at->toDateString(); }}</span>
                <img src="data:image/png;base64,{{ $post->picture }}" alt="Picture" style="max-width: 100%;">
            </div>
        @endforeach
        {{-- <h2>Item #1</h2>
        <h3>Item #2</h2> --}}
    </div>
@endsection
