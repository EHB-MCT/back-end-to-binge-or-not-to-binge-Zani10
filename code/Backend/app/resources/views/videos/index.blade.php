@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DIY Videos</h1>

        <!-- Zoekbalk en Categorieën -->
        <form action="{{ route('videos.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search for videos..." value="{{ request()->query('search') }}">
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->query('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="row" id="video-list">
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
        height: 195px;
        object-fit: cover;
    }

    .search-input {
        border-radius: 20px;
        max-width: 400px;
        margin: 0 auto;
    }
</style>
