<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {

        $query = Video::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $videos = $query->get();
        $categories = Category::all();

        return view('videos.index', compact('videos', 'categories'));
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
        $rating->user_id = auth()->user()->id;
        $rating->rating = $request->input('rating');
        $rating->save();

        return redirect()->route('videos.show', $video->id)->with('success', 'Rating submitted!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $videos = Video::where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->get();

        return response()->json($videos);
    }
}
