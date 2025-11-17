<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'value' => 'required|in:' . Vote::VALUE_LIKE . ',' . Vote::VALUE_DISLIKE,
        ]);

        $request->user()
            ->votes()
            ->updateOrCreate(
                ['post_id' => $post->id],
                ['value' => $validated['value']]
            );

        return back()->with('status', 'Ваш голос учтён.');
    }

    public function destroy(Request $request, Post $post): RedirectResponse
    {
        $request->user()->votes()->where('post_id', $post->id)->delete();

        return back()->with('status', 'Голос удалён.');
    }
}

