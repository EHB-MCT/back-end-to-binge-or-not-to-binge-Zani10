<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('materials')->get();
        return view('videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        $video->load('comments.user', 'ratings', 'materials');
        return view('videos.show', compact('video'));
    }

}




