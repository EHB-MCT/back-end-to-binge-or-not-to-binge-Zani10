@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $video->title }}</h1>
                <p>By <a href="{{ route('profile.show', $video->user) }}">{{ $video->user->name }}</a></p>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe class="embed-responsive-item" src="{{ $video->url }}" allowfullscreen></iframe>
                </div>

                <div class="like-dislike">
                    <form action="{{ route('videos.like', $video->id) }}" method="POST">
                        @csrf
                        <button type="submit" name="is_like" value="1" class="btn btn-outline-success">
                            <i class="fas fa-thumbs-up"></i> {{ $video->likes()->where('is_like', 1)->count() }}
                        </button>
                        <button type="submit" name="is_like" value="0" class="btn btn-outline-danger">
                            <i class="fas fa-thumbs-down"></i> {{ $video->likes()->where('is_like', 0)->count() }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <h4>Materials</h4>
                <ul>
                    @foreach ($video->materials as $material)
                        <li>{{ $material->name }}: {{ $material->quantity }}</li>
                    @endforeach
                </ul>
                <h4>Steps</h4>
                <p>{{ $video->steps }}</p>
            </div>
        </div>
    </div>
@endsection



<!-- CSS for rating system -->
<style>

    .btn {
        margin-right: 5px;
    }

    .btn.active {
        background-color: #28a745;
        color: white;
        border-color: #28a745;
    }

    .btn-danger.active {
        background-color: #dc3545;
        color: white;
        border-color: #dc3545;
    }
</style>

<!-- JavaScript for submitting rating -->
<script>
    document.querySelectorAll('.rating input').forEach(star => {
        star.addEventListener('change', function() {
            document.getElementById('rating-form').submit();
        });
    });
</script>
