<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use App\Models\Category;
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

    public function like(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        // Check if the user has already liked/disliked the video
        $existingLike = Like::where('video_id', $video->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingLike) {
            // Update the existing like/dislike
            $existingLike->update([
                'like' => $request->input('like')
            ]);
        } else {
            // Create a new like/dislike
            Like::create([
                'video_id' => $video->id,
                'user_id' => auth()->id(),
                'like' => $request->input('like')
            ]);
        }

        return redirect()->route('videos.show', $video->id)->with('success', 'Your like/dislike has been recorded.');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        $likes = Like::where('video_id', $id)->where('like', true)->count();
        $dislikes = Like::where('video_id', $id)->where('like', false)->count();
        $userLike = auth()->check() ? Like::where('video_id', $id)->where('user_id', auth()->id())->value('like') : null;

        return view('videos.show', compact('video', 'userLike', 'likes', 'dislikes'));
    }


}
