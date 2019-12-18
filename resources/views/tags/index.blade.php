@extends('layouts.app')



@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success">Add tags</a>
</div>


<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th><strong>Name</strong></th>
                <th><strong>Posts</strong></th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        {{ $tag->posts->count() }}
                    </td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('partials.modal.delete')

@endsection
@section('scripts')
<script>
    function handleDelete(id) {
    var form = document.getElementById('deleteCategoryForm')
    form.action = '/tags/' + id
    $('#deleteModal').modal('show')
  }
</script>

@endsection
