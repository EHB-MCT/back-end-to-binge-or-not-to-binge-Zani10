<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Video $video)
    {
        $like = Like::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'video_id' => $video->id
            ],
            ['like' => $request->input('like')]
        );

        return back()->with('success', 'Your feedback has been recorded.');
    }
}
