<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function update(Request $request, $videoId)
    {
        $progress = Progress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'video_id' => $videoId
            ],
            [
                'completed_steps' => json_encode($request->input('completed_steps', []))
            ]
        );

        return redirect()->route('videos.show', $videoId)->with('success', 'Progress saved.');
    }
}
