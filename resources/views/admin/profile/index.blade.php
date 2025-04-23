@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

<div class="row">
    {{-- Left Side: Profile Picture + Basic Info --}}
    <div class="col-lg-4">
        <div class="au-card recent-report">
            <div class="au-card-inner text-center">
                <h3 class="title-2">Profile</h3>
                <div class="mb-3">
                    <img 
                        src="{{ $user->img ? asset('storage/' . $user->img) : asset('images/default-profile.png') }}" 
                        alt="Profile Photo" 
                        class="img-fluid rounded-circle" 
                        style="width: 150px; height: 150px; object-fit: cover;"
                    >
                </div>
                <h5 class="mt-2">{{ $user->name }}</h5>
                <p>{{ $user->email }}</p>
            </div>
        </div>
    </div>

    {{-- Right Side: Edit Form --}}
    <div class="col-lg-8">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Edit Profile</h3>
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control" 
                            value="{{ old('name', $user->name) }}"
                            required
                        >
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control" 
                            value="{{ old('email', $user->email) }}"
                            required
                        >
                    </div>

                    {{-- New Password --}}
                    <div class="form-group">
                        <label for="password">New Password (optional)</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control"
                        >
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="form-control"
                        >
                    </div>

                    {{-- Profile Photo Upload --}}
                    <div class="form-group">
                        <label for="img">Profile Photo</label>
                        <input 
                            type="file" 
                            name="img" id="img" class="form-control-file" > </div>
                    {{-- Submit --}}
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
