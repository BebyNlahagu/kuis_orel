@extends('layouts.user')
@section('title', 'Jenis Kuis')
@section('main')
<main class="container mb-4">
    <h2>Kuis dan Materi</h2>
    <p class="text-muted mb-4">Silahkan Mulai kuis Di bawah Ini dengan menekan mulai</p>
    <div class="row">
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($kuis as $id)
                <div class="card col-md-6 text-center p-3 mb-3" style="width: 18rem;">
                    <img src="{{ asset('landing/exam.png') }}" class="card-img-top mx-auto" alt="Tryout" style="width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $id->jenis_kuis }}</h5>
                        <a href="{{ route('user.soal', $id->id) }}" data-jenis="{{ strtolower($id->jenis_kuis) }}" class="text-decoration-none btn btn-primary mb-3 kerjakan-btn" 
                            id="kerjakan-{{ $id->id }}" style="pointer-events: none; opacity: 0.5;">Kerjakan
                         </a>
                        <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#modalId">Lihat Skor</button>
                        @if (strtolower($id->jenis_kuis) === 'post test')
                            <a href="{{ route('materi.siswa') }}" class="btn btn-warning white">Lihat materi</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".kerjakan-btn").each(function () {
                let jenisKuis = $(this).data("jenis");

                // Jika kuisnya pre test, tombol selalu aktif
                if (jenisKuis === "pre test") {
                    $(this).css("pointer-events", "auto").css("opacity", "1");
                }
                // Jika kuisnya post test, cek apakah materi sudah dilihat
                else if (localStorage.getItem("materi_dilihat")) {
                    $(this).css("pointer-events", "auto").css("opacity", "1");
                }
            });

            // Jika user klik tombol "Lihat materi", aktifkan tombol "Kerjakan" untuk post test
            $(".btn-warning.white").click(function () {
                localStorage.setItem("materi_dilihat", "true");
                $(".kerjakan-btn[data-jenis='post test']").css("pointer-events", "auto").css("opacity", "1");
            });

            // Jika user klik tombol "Kerjakan", hapus status untuk mengunci kembali setelah masuk ke soal
            $(".kerjakan-btn").click(function () {
                let jenisKuis = $(this).data("jenis");
                if (jenisKuis === "post test") {
                    localStorage.removeItem("materi_dilihat");
                }
            });
        });
    </script>

</main>

<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Kuis</h2>
                                <div class="mt-3">
                                    <strong>Jumlah Total: {{ $hasil }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startButtons = document.querySelectorAll('#startQuiz');
        startButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const quizId = this.dataset.id;
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Kuis ini akan dimulai, Anda tidak bisa mengulang setelahnya.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Mulai',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/user/soal/index`;
                    }
                });
            });
        });
    });
</script>

@endsection
