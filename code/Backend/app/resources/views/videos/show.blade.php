@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Video en beschrijving aan de linkerkant -->
            <div class="col-md-8">
                <h1>{{ $video->title }}</h1>
                <p>{{ $video->description }}</p>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe class="embed-responsive-item" src="{{ $video->url }}" allowfullscreen></iframe>
                </div>
                <!-- Rating systeem -->
                <div class="rating">
                    <h4>Rate this video:</h4>
                    <form action="{{ route('videos.rate', $video->id) }}" method="POST">
                        @csrf
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
                    </form>
                </div>
            </div>
            <!-- Materialen en stappen aan de rechterkant -->
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

<!-- CSS voor het ratingsysteem -->
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
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before {
        content: "\f089";
        position: absolute;
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
