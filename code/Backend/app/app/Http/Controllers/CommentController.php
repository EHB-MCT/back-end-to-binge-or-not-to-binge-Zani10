<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'video_id' => $request->video_id,
            'comment' => $request->comment,
        ]);

        return back();
    }

}
