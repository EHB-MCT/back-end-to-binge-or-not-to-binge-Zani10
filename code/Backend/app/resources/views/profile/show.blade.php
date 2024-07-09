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
                <h3>Progress</h3>
                <div class="list-group">
                    @foreach ($user->progress as $progress)
                        <a href="{{ route('videos.show', $progress->video->id) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="{{ $progress->video->thumbnail }}" alt="{{ $progress->video->title }}" class="progress-thumbnail">
                            <div class="progress-info ml-3">
                                <h5>{{ $progress->video->title }}</h5>
                                <div class="progress-steps">
                                    @php
                                        $completedSteps = json_decode($progress->completed_steps, true);
                                    @endphp
                                    @if (is_array($completedSteps))
                                        @for ($i = 0; $i < count($progress->video->steps); $i++)
                                            <div class="step {{ in_array($i, $completedSteps) ? 'completed' : '' }}"></div>
                                        @endfor
                                    @else
                                        <p>No progress</p>
                                    @endif
                                </div>
                            </div>
                        </a>
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

    .progress-thumbnail {

        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }

    .progress-thumbnail img {
        width: 50px;
        height: 50px;
    }

    .progress-info {
        flex-grow: 1;
    }

    .progress-steps {
        display: flex;
        gap: 5px;
        margin-top: 5px;
    }

    .progress-steps .step {
        width: 20px;
        height: 20px;
        background-color: #ddd;
        border-radius: 50%;
    }

    .progress-steps .step.completed {
        background-color: #28a745;
    }
</style>
