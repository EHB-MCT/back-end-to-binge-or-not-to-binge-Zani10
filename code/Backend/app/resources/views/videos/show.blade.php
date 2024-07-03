// resources/views/videos/show.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $video->title }}</h1>
                <p>{{ $video->description }}</p>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe class="embed-responsive-item" src="{{ $video->url }}" allowfullscreen></iframe>
                </div>
                <!-- Comments Section -->
                <h4>Comments</h4>
                <form action="{{ route('comments.store', $video->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Add a comment:</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                @foreach($video->comments as $comment)
                    <div class="comment mb-3">
                        <div class="d-flex">
                            <div class="mr-3">
                                <img src="{{ $comment->user->profile_photo }}" alt="Profile Photo" class="rounded-circle" style="width: 40px; height: 40px;">
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <small class="text-muted ml-2">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0">{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <!-- Materials and Steps Section -->
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

    .comment .d-flex {
        align-items: flex-start;
    }
    .comment img {
        object-fit: cover;
    }
    .comment p {
        margin: 0;
    }

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
