<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Progress;
use App\Models\Video;
use App\Models\Category;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%')
                ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $videos = $query->get();
        $categories = Category::all();

        return view('videos.index', compact('videos', 'categories'));
    }

    public function show(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $sort = $request->input('sort', 'newest');

        $comments = $video->comments();

        if ($sort == 'newest') {
            $comments = $comments->orderBy('created_at', 'desc');
        } else {
            $comments = $comments->orderBy('created_at', 'asc');
        }

        $comments = $comments->get();

        $likes = Like::where('video_id', $id)->where('is_like', true)->count();
        $dislikes = Like::where('video_id', $id)->where('is_like', false)->count();
        $userLike = auth()->check() ? Like::where('video_id', $id)->where('user_id', auth()->id())->value('is_like') : null;

        $progress = Progress::where('user_id', auth()->id())->where('video_id', $id)->first();

        return view('videos.show', compact('video', 'comments', 'likes', 'dislikes', 'userLike', 'progress'));
    }

    public function like(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $user = auth()->user();

        if ($user) {
            $existingLike = $user->likes()->where('video_id', $video->id)->first();

            if ($existingLike) {
                $existingLike->update([
                    'is_like' => $request->input('like')
                ]);
            } else {
                $user->likes()->create([
                    'video_id' => $video->id,
                    'is_like' => $request->input('like')
                ]);
            }

            $likes = Like::where('video_id', $id)->where('is_like', true)->count();
            $dislikes = Like::where('video_id', $id)->where('is_like', false)->count();

            return response()->json([
                'status' => 'success',
                'likes' => $likes,
                'dislikes' => $dislikes
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'You must be logged in to like or dislike a video.'
        ]);
    }
}

