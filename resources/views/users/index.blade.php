@extends('layouts.app')

@section('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


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
                        {{ $user->username }}
                    </td>
                    @if(auth()->user()->hasRole('Admin'))
                    <td>
                        <button class="btn btn-danger btn-sm btn-change-role" onclick="handleChangeRole(this)" data-id="{{ $user->id }}" data-role="$admin">Make Admin</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btn-change-role" onclick="handleChangeRole(this)" data-id="{{ $user->id }}" data-role="$editor">Make Editor</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btn-change-role" onclick="handleChangeRole(this)" data-id="{{ $user->id }}" data-role="$host">Make Host</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btn-change-role" onclick="handleChangeRole(this)" data-id="{{ $user->id }}" data-role="$writter">Make Writter</button>
                    </td>


                    @endif
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
@include('partials.modal.change-role')

@endsection

@section('scripts')
<script>

    function handleChangeRole(obj) {

     var roles = obj.getAttribute("data-role");
     var user_id = obj.getAttribute("data-id");
     console.log(user_id);
      console.log(roles);

    $.ajax({
        url: '/users/'+ user_id + '/change-role',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
            roles: roles
            }),
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
               console.log('success');
                },
                error: function (err) {
                    console.log('Error!', err);
                },
            });

    // var form = document.getElementById('changeUserRole')
    // form.action = '/change-role/' + id +
    // $('#changeRoleModal').modal('show')
  }
</script>

@endsection
