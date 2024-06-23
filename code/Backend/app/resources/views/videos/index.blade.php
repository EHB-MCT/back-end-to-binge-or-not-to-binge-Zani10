@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DIY Videos</h1>
        @foreach($videos as $video)
            <div>
                <h2><a href="{{ route('videos.show', $video->id) }}">{{ $video->title }}</a></h2>
                <p>{{ $video->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
