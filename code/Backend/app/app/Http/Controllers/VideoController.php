<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $videos = $query->get();

        return view('videos.index', compact('videos'));
    }


    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    public function rate(Request $request, Video $video)
    {
        $rating = new Rating();
        $rating->video_id = $video->id;
        $rating->user_id = auth()->user()->id; // Gebruiker ingelogd moeten zijn om te kunnen beoordelen
        $rating->rating = $request->input('rating');
        $rating->save();

        return redirect()->route('videos.show', $video->id)->with('success', 'Rating submitted!');
    }

}





