<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        $roles = Role::pluck('name', 'id');
        return view('users.index', compact('roles'))->with('users', User::all());
    }

    public function changeUserRole(Request $request, User $user)
    {
        $user->assignRole($request->roles);

        session()->flash('success', 'User role changed successfully');

        return redirect()->back();


    }
}
