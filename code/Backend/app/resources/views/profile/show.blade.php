@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <img src="{{ $user->profile_photo }}" alt="Profile Photo" class="img-thumbnail" width="150">
        <p>{{ $user->bio }}</p>

        <h3>Videos by {{ $user->name }}</h3>
        <div class="row">
            @foreach($user->videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card video-card">
                        <a href="{{ route('videos.show', $video->id) }}">
                            <img src="{{ $video->thumbnail }}" class="card-img-top" alt="{{ $video->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
