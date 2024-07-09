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

                <!-- Like/Dislike system -->
                <div class="like-dislike">
                    <button id="like-button" class="btn btn-success {{ $userLike === 1 ? 'active' : '' }}">
                        <i class="fas fa-thumbs-up"></i> <span id="like-count">{{ $likes }}</span>
                    </button>
                    <button id="dislike-button" class="btn btn-danger {{ $userLike === 0 ? 'active' : '' }}">
                        <i class="fas fa-thumbs-down"></i> <span id="dislike-count">{{ $dislikes }}</span>
                    </button>
                </div>

                <!-- Steps Section -->
                <h4>Steps</h4>
                <div class="steps-container d-flex flex-wrap">
                    @foreach ($video->steps as $index => $step)
                        <div class="step-item {{ in_array($index, json_decode($progress->completed_steps ?? '[]', true)) ? 'completed' : '' }}" data-step="{{ $index }}">
                            <span>{{ $step }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Completion Message -->
                <div id="completion-message" class="mt-4" style="display: none;">
                    <div class="alert alert-success">
                        You have completed all the steps for this tutorial!
                        <button id="reset-progress" class="btn btn-warning">Reset Progress</button>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="d-flex justify-content-between align-items-center mt-5">
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
            <!-- Materials Section -->
            <div class="col-md-4">
                <h4>Materials</h4>
                <div class="row">
                    @foreach ($video->materials as $material)
                        <div class="col-md-6 mb-4">
                            <div class="card material-card">
                                <img src="{{ \App\Helpers\ImageHelper::fetchImage($material->name) }}" class="card-img-top material-image" alt="{{ $material->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $material->name }}</h5>
                                    <p class="card-text">{{ $material->quantity }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- CSS for styling -->
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

    /* Material card styles */
    .material-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .material-card .card-body {
        text-align: center;
        flex-grow: 1;
    }

    .material-image {
        height: 150px;
        object-fit: cover;
    }

    .material-card .card-title {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        margin-top: 0.5rem; /* Adjusted spacing */
    }

    .material-card .card-text {
        font-size: 0.9rem;
    }

    /* Steps styling */
    .steps-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .step-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f8f9fa;
        cursor: pointer;
        flex: 1 1 calc(33% - 10px); /* Three items per row */
    }
    .step-item.completed {
        background-color: #28a745;
        color: white;
    }
</style>

<!-- JavaScript for handling the steps and comments -->
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

        // Handling step completion
        const stepsContainer = document.querySelector('.steps-container');
        const stepItems = stepsContainer.querySelectorAll('.step-item');

        stepItems.forEach(stepItem => {
            stepItem.addEventListener('click', function() {
                const stepIndex = this.dataset.step;
                const isCompleted = this.classList.contains('completed');

                if (!isCompleted) {
                    this.classList.add('completed');
                    updateProgress(stepIndex);
                } else {
                    const prevStep = parseInt(stepIndex) - 1;
                    const prevStepItem = stepsContainer.querySelector(`.step-item[data-step="${prevStep}"]`);
                    if (prevStepItem && prevStepItem.classList.contains('completed')) {
                        this.classList.remove('completed');
                        updateProgress(stepIndex, true);
                    }
                }
            });
        });

        function updateProgress(stepIndex, remove = false) {
            const completedSteps = Array.from(stepsContainer.querySelectorAll('.step-item.completed'))
                .map(item => item.dataset.step);

            fetch("{{ route('progress.update', $video->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    completed_steps: completedSteps
                })
            }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success' && completedSteps.length === stepItems.length) {
                        showCompletionMessage();
                    }
                });
        }

        function showCompletionMessage() {
            stepsContainer.style.display = 'none';
            document.getElementById('completion-message').style.display = 'block';
        }

        document.getElementById('reset-progress').addEventListener('click', function() {
            fetch("{{ route('progress.reset', $video->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        stepItems.forEach(stepItem => stepItem.classList.remove('completed'));
                        stepsContainer.style.display = 'flex';
                        document.getElementById('completion-message').style.display = 'none';
                    }
                });
        });

        // Handle Like/Dislike AJAX
        document.getElementById('like-button').addEventListener('click', function() {
            toggleLike(true);
        });

        document.getElementById('dislike-button').addEventListener('click', function() {
            toggleLike(false);
        });

        function toggleLike(isLike) {
            fetch("{{ route('videos.like', $video->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    like: isLike
                })
            }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('like-count').innerText = data.likes;
                        document.getElementById('dislike-count').innerText = data.dislikes;
                        document.getElementById('like-button').classList.toggle('active', isLike);
                        document.getElementById('dislike-button').classList.toggle('active', !isLike);
                    }
                });
        }
    });
</script>
