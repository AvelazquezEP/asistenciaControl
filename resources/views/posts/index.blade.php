@extends('layouts.app')


@section('content')
    {{-- <h1>POSTS</h1> --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Post</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>title</th>
            <th>Description</th>
            <th>Picture</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->picture }}</td>
                <td>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @can('post-edit')
                            <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        @endcan

                        @csrf

                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {{-- {!! $post->links() !!} --}}
@endsection
