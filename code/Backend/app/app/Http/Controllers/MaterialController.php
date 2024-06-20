<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Video;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create(Video $video)
    {
        return view('materials.create', compact('video'));
    }

    public function store(Request $request, Video $video)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'url' => 'nullable|url',
        ]);

        Material::create([
            'video_id' => $video->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'url' => $request->url,
        ]);

        return redirect()->route('videos.show', $video)->with('success', 'Material added successfully.');
    }

    public function edit(Video $video, Material $material)
    {
        return view('materials.edit', compact('video', 'material'));
    }

    public function update(Request $request, Video $video, Material $material)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'url' => 'nullable|url',
        ]);

        $material->update($request->all());

        return redirect()->route('videos.show', $video)->with('success', 'Material updated successfully.');
    }

    public function destroy(Video $video, Material $material)
    {
        $material->delete();

        return redirect()->route('videos.show', $video)->with('success', 'Material deleted successfully.');
    }
}



