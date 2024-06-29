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
                        <button type="submit" class="btn btn-success">Like {{ $likes }}</button>
                    </form>
                    <form action="{{ route('videos.like', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="like" value="0">
                        <button type="submit" class="btn btn-danger">Dislike {{ $dislikes }}</button>
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
    .rating {
        border: none;
        float: left;
    }
    .rating > input {
        display: none;
    }
    .rating > label:before {
        margin: 5px;
        font-size: 2em;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        display: inline-block;
        content: "\f005";
    }
    .rating > label {
        color: #ddd;
        float: right;
    }
    .rating > input:checked ~ label,
    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: #FFD700;
    }
    .rating > input:checked + label:hover,
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label,
    .rating > input:checked ~ label:hover ~ label {
        color: #FFED85;
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
