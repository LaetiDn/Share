@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($category)  ? 'Edit Category' : 'Create category' }}
    </div>
    <div class="card-body">
        @include('partials.error')
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="form-group">
                <input type="text" class="form-control" name="name"  value="{{ isset($category) ? $category->name : '' }}" placeholder="{{ isset($category) ? $category->name : 'Name' }}">
            </div>
            <div class="class-group">
                <button class="btn btn-success">
                    {{ isset($category) ? 'Update Category': 'Add Category' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
