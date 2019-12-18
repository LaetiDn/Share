@extends('layouts.app')



@section('content')


{{-- <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('users.create') }}" class="btn btn-success">Add users</a>
</div> --}}

<div class="card card-default">
    <div class="card-header">
        users
    </div>
    <div class="card-body">
        @if($users->count() > 0)
        <table class="table">
            <thead>
                <th><strong>Avatar</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Username</strong></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <img src="{{$user->avatar}}" width="120px" height="60px" alt="user image">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    {{-- @if($user->trashed())
                    <td>
                        <form action="{{ route('restore-users', $user->id)}}" method="user">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>

                    @endif
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="user">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                {{ $user->trashed() ? 'Delete' : 'Trash' }}

                            </button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <thead>
            <th><strong>No users yet !</strong></th>
        </thead>

        @endif
    </div>
</div>
@endsection
