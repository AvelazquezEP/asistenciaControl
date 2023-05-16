<div class="container-fluid">
    <div class="row">
        @for ($users as $user)
            <div class="col-sm-3 margin">
                {{-- <img src="  {{ URL::asset('/img/' . $topic->img_url) }} " class="img-circle myimg"
                    alt="cinque terre"> --}}
                <section>
                    <h1 class="center"> {{ $user->name }}</h1>
                    <p class="center maxlength"> {{ $user->email }} </p>
                    <p class="center maxlength"> {{ $user->password }} </p>
                    {{-- <center> <a href="{{ route('index.topic', [$topic->id]) }}">Read More...</a></center> --}}
                </section>
            </div>
        @endforeach
    </div>
</div>
