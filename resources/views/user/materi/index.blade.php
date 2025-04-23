@extends('layouts.user')
@section('title', 'Kuis Interaktif SMP Putri Cahaya Medan')
@section('main')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ujian') }}">Jenis Kuis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Materi</li>
        </ol>
    </nav>
</div>

    <main class="container main mb-4 owl-animated-in">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex flex-nowrap gap-3 mb-3 justify-items-center">
                    @foreach ($materi as $ma)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-bold">{{ $ma->mapel }}</h4>
                                <p>{{ $ma->kelas }}</p>
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/videos/' . $ma->video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection