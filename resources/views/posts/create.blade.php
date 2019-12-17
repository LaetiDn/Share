@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($post)  ? 'Edit posts' : 'Create Posts' }}
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
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ isset($post) ? $post->title : '' }}"
                    placeholder="{{ isset($post) ? $post->title : 'Title' }}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="adress" id="adress"
                    value="{{ isset($post) ? $post->adress : '' }}"
                    placeholder="{{ isset($post) ? $post->adress : 'adress' }}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="country" id="country"
                    value="{{ isset($post) ? $post->country : '' }}"
                    placeholder="{{ isset($post) ? $post->country : 'country' }}">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="5" rows="5"
                    value="{{ isset($post) ? $post->description : '' }}"
                    placeholder="{{ !isset($post) ? 'Description' : '' }}">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="content"></trix-editor>
            </div>


            <div class="form-group">
                <input type="text" class="form-control" name="published_at" id="published_at"
                    value="{{ isset($post) ? $post->published_at : '' }}"
                    placeholder="{{ isset($post) ? $post->published_at : 'Published at' }}">
            </div>

            @if(isset($post))
            <div class="form-group">
                <img src="{{ asset($post->image )}}" width="100%" alt="post image">
            </div>

            @endif

            <div class="form-group">
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(isset($post))
                            @if($category->id === $post->category_id)
                                selected
                            @endif
                        @endif
                        >
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr('#published_at', {
            enableTime: true
        });
</script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
