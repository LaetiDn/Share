<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        return view('users.index')->with('users', User::all());
    }

    public function changeUserRole(Request $request, User $user)
    {
        $user->roles()->sync($$request->roles);

        dd($roles);

        session()->flash('success', 'User role changed successfully');

        return redirect()->back();


    }
}
