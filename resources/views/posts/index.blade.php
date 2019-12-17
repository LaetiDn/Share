@extends('layouts.app')



@section('content')


<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add Posts</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        @if($posts->count() > 0)
        <table class="table">
            <thead>
                <th><strong>Name</strong></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <img src="{{$post->image}}" width="120px" height="60px" alt="post image">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    @if(!$post->trashed())
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                {{ $post->trashed() ? 'Delete' : 'Trash' }}

                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <thead>
                <th><strong>No Posts yet !</strong></th>
            </thead>

        @endif
    </div>
</div>
@endsection
