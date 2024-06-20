@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Material for {{ $video->title }}</h1>

        <form action="{{ route('materials.update', [$video->id, $material->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $material->name }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $material->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" id="url" class="form-control" value="{{ $material->url }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Material</button>
        </form>
    </div>
@endsection
