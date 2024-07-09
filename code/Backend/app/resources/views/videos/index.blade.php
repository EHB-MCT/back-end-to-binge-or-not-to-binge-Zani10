@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Search bar and category filter -->
        <form action="{{ route('videos.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for videos..." value="{{ request()->query('search') }}" style="max-width: 400px;">
                <select name="category_id" class="form-control ml-2" style="max-width: 200px;">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->query('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card video-card">
                        <a href="{{ route('videos.show', $video->id) }}">
                            <img src="{{ $video->thumbnail }}" class="card-img-top" alt="{{ $video->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $video->user->profile_photo }}" alt="{{ $video->user->name }}" class="rounded-circle mr-2" width="30" height="30">
                                <span>{{ $video->user->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<!-- CSS for card and image styles -->
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
        height: 195px;
        object-fit: cover;
    }

    .rounded-circle {
        border-radius: 50%;
    }

    .input-group {
        justify-content: center;
    }

    .input-group input, .input-group select, .input-group .input-group-append button {
        border-radius: 20px;
    }

    .input-group .input-group-append button {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group .input-group-prepend .input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

</style>
