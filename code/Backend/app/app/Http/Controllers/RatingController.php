<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'rating' => 'required|integer|between:1,5',
        ]);

        Rating::updateOrCreate(
            ['user_id' => Auth::id(), 'video_id' => $request->video_id],
            ['rating' => $request->rating]
        );

        return redirect()->back()->with('success', 'Rating submitted successfully.');
    }
}

