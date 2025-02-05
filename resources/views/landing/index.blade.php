@extends('layouts.landing')

@section('title','Halaman Utama')
@section('header')
<div class="container-fluid px-0 px-md-5 mb-5" style="background-color: gray">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">Kuis Interaktif</h4>
            <h1 class="display-3 font-weight-bold text-white" style="font-size: 3rem">
               SMP PUTRI CAHAYA MEDAN
            </h1>
            <p class="text-white mb-4">
                Selamat datang di kuis interaktif! Uji pengetahuanmu, kumpulkan poin, dan jadilah juara di setiap tantangan!
            </p>
            <a href="{{ route('landing.about') }}" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="{{ asset('landing/img/svg1.png') }}" alt="" />
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('landing/img/svg.png')}}" alt="" />
            </div>
            <div class="col-lg-7">
                <p class="section-title pr-5">
                    <span class="pr-2">Tentang Kuis Interaktif</span>
                </p>
                <h1 class="mb-4">Mengasah Kemampuanmu!</h1>
                <p>
                    Selamat datang di kuis interaktif kami yang penuh tantangan dan keseruan! Siapkan dirimu untuk menguji pengetahuan, mengasah kemampuan, dan meraih poin tertinggi. Dengan berbagai pertanyaan menarik dan beragam kategori, setiap kuis akan membawamu pada petualangan intelektual yang seru. Jangan lewatkan kesempatan untuk menjadi juara dan tunjukkan bahwa kamu adalah yang terbaik. Ayo, mulailah petualanganmu sekarang dan buktikan kepintaranmu!
                </p>
                <div class="row pt-2 pb-4">
                    <div class="col-6 col-md-4">
                        <img class="img-fluid rounded" src="{{ asset('landing/img/svg2.png')}}" alt="" />
                    </div>
                    <div class="col-6 col-md-8">
                        <ul class="list-inline m-0">
                            <li class="py-2 border-top border-bottom">
                                <i class="fa fa-check mr-3"></i>Kemampuan Berpikir
                            </li>
                            <li class="py-2 border-bottom">
                                <i class="fa fa-check mr-3"></i>Penuh Tantangan
                            </li>
                            <li class="py-2 border-bottom">
                                <i class="fa fa-check mr-3"></i>Mengasah Kemampuan
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="" class="btn btn-primary mt-2 py-2 px-4">Ayok Mulai!</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Class Start -->
<div class="container-fluid pt-5 d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Jenis Kuis</span>
            </p>
            <h1 class="mb-4">Asah Kemampuanmu dengan Berbagai Kategori!</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    <img class="card-img-top mb-2" src="img/class-1.jpg" alt="" />
                    <div class="card-body text-center">
                        <h4 class="card-title">Pre Test</h4>
                        <p class="card-text">
                           Pre test akan laksanakan sebelum menggunakan aplikasi
                        </p>
                    </div>
                    <div class="card-footer bg-transparent py-4 px-5">
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Jumlah Soal</strong>
                            </div>
                            <div class="col-6 py-1">25 Soal</div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Mata Pelajaran</strong>
                            </div>
                            <div class="col-6 py-1">Matematika</div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Waktu</strong>
                            </div>
                            <div class="col-6 py-1">60 Menit</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    <img class="card-img-top mb-2" src="img/class-2.jpg" alt="" />
                    <div class="card-body text-center">
                        <h4 class="card-title">Post Test</h4>
                        <p class="card-text">
                            Selamat datang di post-test! Tunjukkan hasil belajarmu, uji pemahamanmu, dan buktikan peningkatan yang telah kamu capai!
                        </p>
                    </div>
                    <div class="card-footer bg-transparent py-4 px-5">
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Jumlah Soal</strong>
                            </div>
                            <div class="col-6 py-1">25 Soal</div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Mata Pelajaran</strong>
                            </div>
                            <div class="col-6 py-1">Matematika</div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-6 py-1 text-right border-right">
                                <strong>Waktu</strong>
                            </div>
                            <div class="col-6 py-1">60 Menit</div>
                        </div>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 mx-auto mb-4">Join</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Class End -->
@endsection
