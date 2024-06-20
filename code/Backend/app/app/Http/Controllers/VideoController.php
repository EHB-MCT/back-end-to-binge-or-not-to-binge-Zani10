<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhereHas('category', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $videos = $query->get();

        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all(); // Zorg ervoor dat categorieën beschikbaar zijn
        return view('videos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
            'steps' => 'required',
            'category_id' => 'required',
        ]);

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'steps' => $request->steps,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    public function show(Video $video)
    {
        $materials = $video->materials;
        return view('videos.show', compact('video', 'materials'));
    }

    public function edit(Video $video)
    {
        $categories = \App\Models\Category::all(); // Zorg ervoor dat categorieën beschikbaar zijn
        return view('videos.edit', compact('video', 'categories'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
            'steps' => 'required',
            'category_id' => 'required',
        ]);

        $video->update($request->all());

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}




