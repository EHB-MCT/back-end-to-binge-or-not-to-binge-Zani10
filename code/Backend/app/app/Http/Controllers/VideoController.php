<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }
}





