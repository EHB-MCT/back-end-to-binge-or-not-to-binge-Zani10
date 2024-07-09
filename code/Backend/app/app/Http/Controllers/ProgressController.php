<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function update(Request $request, $videoId)
    {
        $user = Auth::user();
        $progress = Progress::firstOrNew(['user_id' => $user->id, 'video_id' => $videoId]);
        $progress->completed_steps = json_encode($request->input('completed_steps'));
        $progress->save();

        if ($request->ajax()) {
            return response()->json(['status' => 'success']);
        }

        return redirect()->route('videos.show', $videoId);
    }

    public function reset($videoId)
    {
        $user = Auth::user();
        $progress = Progress::where('user_id', $user->id)->where('video_id', $videoId)->first();

        if ($progress) {
            $progress->completed_steps = json_encode([]);
            $progress->save();
        }

        return redirect()->route('videos.show', $videoId);
    }
}
