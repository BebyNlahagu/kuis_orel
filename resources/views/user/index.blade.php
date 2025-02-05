@extends('layouts.user')
@section('title', 'Kuis Interaktif SMP Putri Cahaya Medan')
@section('main')
    <main class="container main mb-4 owl-animated-in">
        <h2>Kuis</h2>
        <p class="text-muted mb-4">Silahkan Mulai kuis Di bawah Ini dengan menekan mulai</p>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 mb-4">
                <a href="{{ route('kuis.show') }}" class="text-decoration-none mb-4">
                    <div class="card text-center p-3">
                        <img src="{{ asset('landing/exam.png') }}" class="card-img-top mx-auto" alt="Tryout"
                            style="width: 100px;">
                        <div class="card-body">
                            <h5 class="card-title">KUIS Interaktif</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h2 class="mt-5">Kategori Nilai</h2>
        <p class="text-muted mb-4">Kategori Penilaian</p>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card text-center p-3">
                    <img src="{{ asset('landing/img/Rank1.png') }}" class="card-img-top mx-auto" alt="CPNS"
                        style="width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Nilai 100</h5>
                        <h3>Baik Sekali</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center p-3">
                    <img src="{{ asset('landing/img/Rank2.png') }}" class="card-img-top mx-auto" alt="BUMN"
                        style="width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Nilai 75 - 100</h5>
                        <h3>Baik</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center p-3">
                    <img src="{{ asset('landing/img/rank3.svg') }}" class="card-img-top mx-auto" alt="Kedinasan"
                        style="width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Nilai 50 - 75</h5>
                        <h3>Cukup</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center p-3">
                    <img src="{{ asset('landing/img/Rank4.png') }}" class="card-img-top mx-auto" alt="PPPK"
                        style="width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Nilai 50</h5>
                        <h3>Kurang</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal trigger button -->
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    

@endsection
