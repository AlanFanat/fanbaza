<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    public function show(User $user): View
    {
        $posts = $user->posts()
            ->with('user')
            ->withVoteCounters()
            ->latest()
            ->paginate(9);

        return view('profile.show', [
            'profileUser' => $user,
            'posts' => $posts,
        ]);
    }
}

