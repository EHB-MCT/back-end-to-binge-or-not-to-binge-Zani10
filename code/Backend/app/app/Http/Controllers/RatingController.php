<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Video;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Video $video)
    {
        $rating = Rating::updateOrCreate(
            [
                'video_id' => $video->id,
                'user_id' => auth()->id(),
            ],
            [
                'rating' => $request->input('rating'),
            ]
        );

        return redirect()->route('videos.show', $video->id)->with('success', 'Rating submitted!');
    }
}
