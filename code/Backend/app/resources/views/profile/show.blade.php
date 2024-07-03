@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Profile Photo and Bio -->
            <div class="col-md-4 text-center">
                @if ($user->profile_photo)
                    <img src="{{ $user->profile_photo }}" alt="Profile Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                @endif
                <h2 class="mt-3">{{ $user->name }}</h2>
                <p>{{ $user->bio }}</p>
                <hr>
                <p><strong>Total Likes:</strong> {{ $user->totalLikes() }}</p>
                @auth
                    @if (auth()->id() === $user->id)
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                    @endif
                @endauth
            </div>

            <!-- User's Videos -->
            <div class="col-md-8">
                <h3>Posted Videos</h3>
                <div class="row">
                    @foreach ($user->videos as $video)
                        <div class="col-md-4 mb-4">
                            <div class="card video-card">
                                <a href="{{ route('videos.show', $video->id) }}">
                                    <img src="{{ $video->thumbnail }}" class="card-img-top" alt="{{ $video->title }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $video->title }}</h5>
                                    <p class="card-text">{{ Str::limit($video->description, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- CSS for styling the profile page -->
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
        height: 125px;
        object-fit: cover;
    }
</style>
