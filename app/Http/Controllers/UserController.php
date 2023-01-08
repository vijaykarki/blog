<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('profiles.role', compact('users'));
    }

    public function update(Request $request, User $user)
{
    $user->update($request->only('role'));
    return back()->with('status', 'User role updated successfully');
}

}
