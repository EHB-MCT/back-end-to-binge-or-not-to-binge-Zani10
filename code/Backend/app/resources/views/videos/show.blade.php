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
                <div class="d-flex justify-content-between align-items-center">
                    <h4>{{ $comments->count() }} comments</h4>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortCommentsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort"></i> Sort by
                        </button>
                        <div class="dropdown-menu" aria-labelledby="sortCommentsDropdown">
                            <a class="dropdown-item" href="{{ route('videos.show', ['video' => $video->id, 'sort' => 'newest']) }}">Newest first</a>
                            <a class="dropdown-item" href="{{ route('videos.show', ['video' => $video->id, 'sort' => 'oldest']) }}">Oldest first</a>
                        </div>
                    </div>
                </div>
                <div class="comment-input-section mb-4">
                    <div class="d-flex align-items-start">
                        <img src="{{ auth()->user()->profile_photo }}" alt="Profile Photo" class="rounded-circle" style="width: 40px; height: 40px;">
                        <div class="flex-grow-1 ml-3">
                            <input type="text" id="comment-input" class="form-control border-0" placeholder="Add a comment..." onfocus="showCommentButtons()">
                            <hr class="comment-line">
                            <div id="comment-buttons" class="mt-2">
                                <button class="btn btn-secondary btn-sm mr-2" onclick="cancelComment()">Cancel</button>
                                <button id="submit-comment" type="button" class="btn btn-primary">Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @foreach($comments as $comment)
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
                <div class="materials">
                    @foreach ($video->materials as $material)
                        <div class="material-item">
                            <div class="material-image">
                                @php
                                    $image = \App\Helpers\ImageHelper::fetchImage($material->name);
                                @endphp
                                @if ($image)
                                    <img src="{{ $image }}" alt="{{ $material->name }}" class="img-thumbnail">
                                @endif
                            </div>
                            <div class="material-info">
                                <span>{{ $material->name }}</span>
                                <span>{{ $material->quantity }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h4>Steps</h4>
                <form action="{{ route('progress.update', $video->id) }}" method="POST">
                    @csrf
                    <ul class="steps">
                        @foreach ($video->steps as $index => $step)
                            <li class="step-item">
                                <span>{{ $step }}</span>
                                <input type="checkbox" name="completed_steps[]" value="{{ $index }}"
                                    {{ in_array($index, $progress->completed_steps ?? []) ? 'checked' : '' }}>
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="btn btn-primary">Save Progress</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- CSS for styling -->
<style>
    .materials {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .material-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        max-width: 150px;
        background-color: #f9f9f9;
        height: 200px; /* Adjusted height for consistency */
    }
    .material-image img {
        width: 100%;
        height: 150px; /* Adjusted height for images */
        object-fit: cover; /* Ensures images are cropped proportionately */
        border-radius: 5px;
    }
    .material-info {
        margin-top: 10px;
        text-align: center;
    }
    .steps {
        list-style-type: none;
        padding: 0;
    }
    .step-item {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }
    .step-item span {
        flex-grow: 1;
    }
    .step-item input[type="checkbox"] {
        margin-left: 10px;
    }
    .comment .d-flex {
        align-items: flex-start;
    }
    .comment img {
        object-fit: cover;
    }
    .comment p {
        margin: 0;
    }
    .comment-input-section {
        border-color: #ffffff;
    }

    input:focus + .comment-line {
        border-color: rgba(0, 0, 0, 0.53);
    }

    .comment-input-section {
        position: relative;
    }
    #comment-buttons {
        display: flex;
        justify-content: flex-end;
    }
    .btn {
        margin-right: 5px;
    }
</style>

<!-- JavaScript for handling the comment input actions -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function cancelComment() {
            document.getElementById('comment-input').value = '';
            document.getElementById('comment-buttons').classList.add('d-none');
        }

        function showCommentButtons() {
            document.getElementById('comment-buttons').classList.remove('d-none');
        }

        document.getElementById('submit-comment').addEventListener('click', function() {
            let comment = document.getElementById('comment-input').value.trim();
            if (comment !== '') {
                let form = document.createElement('form');
                form.action = "{{ route('comments.store', ['video' => $video->id]) }}";
                form.method = 'POST';

                let csrfField = document.createElement('input');
                csrfField.type = 'hidden';
                csrfField.name = '_token';
                csrfField.value = "{{ csrf_token() }}";
                form.appendChild(csrfField);

                let commentField = document.createElement('input');
                commentField.type = 'hidden';
                commentField.name = 'comment';
                commentField.value = comment;
                form.appendChild(commentField);

                document.body.appendChild(form);
                form.submit();
            }
        });

        document.getElementById('comment-input').addEventListener('focus', showCommentButtons);
    });
</script>
