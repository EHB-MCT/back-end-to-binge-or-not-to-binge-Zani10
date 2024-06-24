<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::create([
            'video_id' => $request->video_id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('videos.show', $request->video_id);
    }
}


