@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($category)  ? 'Edit posts' : 'Create Posts' }}
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        </div>
        @endif
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}" placeholder="{{ isset($post) ? $post->name : 'Name' }}">
            </div>

            <div class="form-group">
                <textarea type="text" class="form-control" name="description" id="description" cols="5" rows="5" value="{{ isset($post) ? $post->description : '' }}" placeholder="{{ isset($post) ? $post->name : 'Description' }}">
            </div>

            <div class="form-group">
                <textarea type="text" class="form-control" name="content" id="content" cols="5" rows="5" value="{{ isset($post) ? $post->content : '' }}" placeholder="{{ isset($post) ? $post->content : 'Content' }}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}" placeholder="{{ isset($post) ? $post->published_at : 'Published at' }}">
            </div>


            <div class="form-group">
                <input type="file" class="form-control" name="image" id="image" value="{{ isset($post) ? $post->published_at : '' }}" placeholder="{{ isset($post) ? $post->published_at : 'Image' }}">
            </div>

            <div class="class-group">
                <button class="btn btn-success">
                    {{ isset($post) ? 'Update Post': 'Add Post' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
