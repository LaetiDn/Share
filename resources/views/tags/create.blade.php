@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($tag)  ? 'Edit tag' : 'Create tag' }}
    </div>
    <div class="card-body">
        @include('partials.error')
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
            @csrf
            @if(isset($tag))
                @method('PUT')
            @endif
            <div class="form-group">
                <input type="text" class="form-control" name="name"  value="{{ isset($tag) ? $tag->name : '' }}" placeholder="{{ isset($tag) ? $tag->name : 'Name' }}">
            </div>
            <div class="class-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($tag) ? 'Update tag': 'Add tag' }}
                </button>
                <a href="{{url()->previous()}}" class="btn btn-danger ml-2">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
