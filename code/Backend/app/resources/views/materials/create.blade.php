@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Material for {{ $video->title }}</h1>

        <form action="{{ route('materials.store', $video->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" id="url" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add Material</button>
        </form>
    </div>
@endsection
