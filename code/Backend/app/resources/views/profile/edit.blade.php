
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                @if ($user->profile_photo)
                    <div>
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100">
                    </div>
                @endif
                <input type="file" name="profile_photo" id="profile_photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
