<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use App\Models\Category;
use App\Models\Progress;
use Illuminate\Http\Request;

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

    public function show(Request $request, Video $video)
    {
        $sort = $request->input('sort', 'newest');

        $comments = $video->comments();

        if ($sort == 'newest') {
            $comments = $comments->orderBy('created_at', 'desc');
        } else {
            $comments = $comments->orderBy('created_at', 'asc');
        }

        $comments = $comments->get();

        $progress = auth()->user() ? Progress::where('user_id', auth()->id())->where('video_id', $video->id)->first() : null;

        return view('videos.show', compact('video', 'comments', 'progress'));
    }

    public function like(Request $request, Video $video)
    {
        $existingLike = Like::where('video_id', $video->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingLike) {
            $existingLike->update([
                'is_like' => $request->input('is_like')
            ]);
        } else {
            Like::create([
                'video_id' => $video->id,
                'user_id' => auth()->id(),
                'is_like' => $request->input('is_like')
            ]);
        }

        return redirect()->route('videos.show', $video->id)->with('success', 'Your like/dislike has been recorded.');
    }

    public function updateProgress(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $progress = Progress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'video_id' => $video->id,
            ],
            [
                'current_step' => $request->input('current_step'),
            ]
        );

        return redirect()->route('videos.show', $video->id)->with('success', 'Progress updated!');
    }
}
