@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $video->title }}</h1>
        <p>{{ $video->description }}</p>
        <iframe width="560" height="315" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>

        <h2>Materials</h2>
        <ul>
            @foreach($video->materials as $material)
                <li>{{ $material->name }}: {{ $material->quantity }}</li>
            @endforeach
        </ul>

        <h2>Steps</h2>
        <p>Describe the steps here...</p>

        <h2>Comments</h2>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <div>
                <textarea name="comment" required></textarea>
            </div>
            <button type="submit">Submit Comment</button>
        </form>

        <ul>
            @foreach($video->comments as $comment)
                <li>{{ $comment->comment }} - <strong>{{ $comment->user->name }}</strong></li>
            @endforeach
        </ul>

        <h2>Rate this Video</h2>
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <div>
                <label for="rating">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required>
            </div>
            <button type="submit">Submit Rating</button>
        </form>
    </div>
@endsection
