@extends('layouts.user')
@section('title', 'Profile')
@section('main')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url(Auth::user()->img) }}" alt="foto" width="50">
                                </div>
                                <div class="col-md-8">
                                    <p>{{ Auth::user()->name }}</p>
                                    <p>{{ Auth::user()->email }}</p>
                                    <p>{{ Auth::user()->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Ubah Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profil.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="name">Nama</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="email">Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="img">Foto</label>
                                    <input type="file" name="img"
                                        class="form-control @error('img')
                                    is-invalid @enderror">
                                    @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
