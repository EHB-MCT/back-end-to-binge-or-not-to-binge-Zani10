@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload New Video</h1>

        <form action="{{ route('videos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="url">Video URL</label>
                <input type="url" name="url" id="url" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="steps">Steps</label>
                <textarea name="steps" id="steps" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Upload Video</button>
        </form>
    </div>
@endsection
