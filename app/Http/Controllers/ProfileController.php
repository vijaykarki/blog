<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        auth()->user()->profile()->create($request->all());

        return redirect()->route('profiles.show', auth()->user());
    }

    public function show(Profile $profile)
    {
        $posts = $profile->user->posts;

        return view('profiles.show', compact('profile', 'posts'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'location' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.show', $profile);
    }
}
