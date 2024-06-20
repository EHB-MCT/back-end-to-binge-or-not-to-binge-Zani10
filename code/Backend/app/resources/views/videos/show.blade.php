@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $video->title }}</h1>
        <iframe width="560" height="315" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
        <p>{{ $video->description }}</p>
        <h2>Steps</h2>
        <p>{{ $video->steps }}</p>

        <h2>Materials</h2>
        <a href="{{ route('materials.create', $video->id) }}" class="btn btn-primary">Add Material</a>
        <ul>
            @foreach($materials as $material)
                <li>
                    {{ $material->name }} - {{ $material->quantity }}
                    @if($material->url)
                        (<a href="{{ $material->url }}" target="_blank">Link</a>)
                    @endif
                    <form action="{{ route('materials.destroy', [$video->id, $material->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="{{ route('materials.edit', [$video->id, $material->id]) }}" class="btn btn-secondary btn-sm">Edit</a>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-secondary">Edit Video</a>
        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Video</button>
        </form>

        <h2>Rate this Video</h2>
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <div class="form-group">
                <label for="rating">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Rating</button>
        </form>

        <h2>Comments</h2>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>

        <ul>
            @foreach($video->comments as $comment)
                <li>{{ $comment->comment }} - <strong>{{ $comment->user->name }}</strong></li>
            @endforeach
        </ul>
    </div>
@endsection
