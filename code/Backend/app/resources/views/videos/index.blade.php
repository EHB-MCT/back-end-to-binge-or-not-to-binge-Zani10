@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DIY Videos</h1>
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card video-card">
                        <a href="{{ route('videos.show', $video->id) }}">
                            <img src="{{ $video->thumbnail }}" class="card-img-top" alt="{{ $video->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <p class="card-text">{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<!-- CSS voor het hover- en zoom-effect -->
<style>
    .video-card {
        transition: transform 0.2s, opacity 0.2s;
    }

    .video-card:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    .card-img-top {
        width: 100%;
        height: auto;
    }
</style>
