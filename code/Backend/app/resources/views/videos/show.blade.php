@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Video and description -->
            <div class="col-md-8">
                <h1>{{ $video->title }}</h1>
                <p>{{ $video->description }}</p>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe class="embed-responsive-item" src="{{ $video->url }}" allowfullscreen></iframe>
                </div>
                <!-- Like/Dislike system -->
                <div class="like-dislike">
                    <form action="{{ route('videos.like', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="like" value="1">
                        <button type="submit" class="btn btn-success {{ $userLike === 1 ? 'active' : '' }}">
                            <i class="fas fa-thumbs-up"></i> ({{ $likes }})
                        </button>
                    </form>
                    <form action="{{ route('videos.like', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="like" value="0">
                        <button type="submit" class="btn btn-danger {{ $userLike === 0 ? 'active' : '' }}">
                            <i class="fas fa-thumbs-down"></i> ({{ $dislikes }})
                        </button>
                    </form>
                </div>
            </div>
            <!-- Materials and steps -->
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
