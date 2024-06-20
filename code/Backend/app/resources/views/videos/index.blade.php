@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Videos</h1>
        <a href="{{ route('videos.create') }}" class="btn btn-primary">Upload New Video</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('videos.index') }}" class="mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search for videos..." value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>

        <ul>
            @foreach($videos as $video)
                <li>
                    <a href="{{ route('videos.show', $video->id) }}">{{ $video->title }}</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
