@extends('layouts.user')
@section('title', 'Jenis Kuis')
@section('main')
<main class="container mb-4">
    @foreach ($kuis as $id)
    <h2>{{ $id->jenis_kuis }}</h2>
    <p class="text-muted mb-4">Silahkan Mulai kuis Di bawah Ini dengan menekan mulai</p>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card text-center p-3">
                <img src="{{ asset('landing/exam.png') }}" class="card-img-top mx-auto" alt="Tryout" style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $id->jenis_kuis }}</h5>
                    <a href="{{ route('user.soal', $id->id) }}" class="text-decoration-none btn btn-primary" id="startQuiz" data-id="{{ $id->id }}">Kejakan</a>
                    <button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#modalId">
                        Lihat Skor
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>

<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Skor</h2>
                                <div class="mt-3">
                                    <strong>Jumlah Nilai Ujian: {{ $hasil }}</strong>
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
