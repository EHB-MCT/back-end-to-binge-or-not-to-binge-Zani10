@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <input type="file" name="profile_photo" class="form-control-file">
                @if ($user->profile_photo)
                    <img src="{{ $user->profile_photo }}" alt="Profile Photo" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control">{{ $user->bio }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
