@extends('layouts.user')

<style>
    /* Warna modern */
    :root {
        --primary-color: #6a11cb;
        --secondary-color: #2575fc;
        --color: yellow;
        --accent-color: #ff6f61;
        --background-gradient: linear-gradient(145deg, #f9f9f9, #e0e0e0);
        --card-gradient: linear-gradient(145deg, #ffffff, #f1f1f1);
        --text-color: #2c3e50;
        --hover-color: #e0f7fa;
    }

    /* Background dengan tema anak-anak */
    body {
        /* Ganti dengan URL gambar background anak-anak */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Comic Sans MS', cursive, sans-serif; /* Font yang ramah anak-anak */
    }

    /* Container utama */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card untuk pertanyaan */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: cardEnter 0.5s ease-in-out;
    }

    /* Header card */
    .card-header {
        background: linear-gradient(145deg, var(--primary-color), var(--secondary-color));
        background-size: 200% 200%;
        animation: gradientShift 5s ease infinite;
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 20px;
        text-align: center;
    }

    .card-header h4 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }

    /* Body card */
    .card-body {
        padding: 20px;
    }

    /* Teks pertanyaan */
    .question-text {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        color: var(--text-color);
        text-align: center;
    }

    /* Bubble pilihan jawaban */
    .custom-bubble {
        display: inline-flex;
        align-items: center;
        padding: 15px 30px;
        background-color: white;
        border-radius: 30px;
        cursor: pointer;
        font-size: 16px;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        transition: all 0.3s ease;
        box-shadow: 0 8px 15px rgba(0, 123, 255, 0.1);
        margin: 10px;
    }

    .custom-bubble:hover {
        transform: scale(1.05);
        background-color: var(--hover-color);
        box-shadow: 0 12px 25px rgba(0, 123, 255, 0.3);
    }

    .custom-radio:checked + .custom-bubble {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        animation: pulse 0.5s ease-in-out;
    }

    /* Tombol 3D */
    .btn-3d {
        padding: 12px 24px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        color: white;
        background: linear-gradient(145deg, var(--secondary-color), var(--primary-color));
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        transition: all 0.2s ease-in-out;
    }

    .btn-3d:hover {
        transform: translateY(-2px);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:active {
        transform: translateY(0);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Countdown timer */
    .countdown-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px 0;
    }

    .countdown-text {
        font-size: 36px;
        font-weight: bold;
        color: var(--color);
        animation: countdownPulse 1s infinite;
    }

    .progress-bar {
        width: 80%;
        height: 10px;
        background-color: #e0e0e0;
        border-radius: 10px;
        margin-top: 10px;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        width: 100%;
        background: linear-gradient(145deg, var(--primary-color), var(--color));
        border-radius: 10px;
        transition: width 1s linear;
    }

    /* Animasi */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes bubblePop {
        0% { transform: scale(0.9); opacity: 0; }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); opacity: 1; }
    }

    @keyframes slideInLeft {
        from { transform: translateX(-20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
        from { transform: translateX(20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    @keyframes cardEnter {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

    @keyframes countdownPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

@section('main')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('jawaban.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header mb-2 text-center">
                            <h4>Waktu Tersisa:</h4>
                            <div class="countdown-container">
                                <div class="countdown-text" id="countdown">10:00</div>
                                <div class="progress-bar">
                                    <div class="progress" id="progress"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4" id="subBtn">Submit</button>
                        </div>
                        <div class="card-body" style="text-align: center">
                            <div id="questions-container">
                                @foreach ($soal as $index => $soal)
                                <div class="question" id="question-{{ $soal->id }}" style="display: {{ $index == 0 ? 'block' : 'none' }}" data-correct-answer="{{ $soal->jawaban_benar }}">
                                    <p class="question-text"><strong>{{ $soal->pertanyaan }}</strong></p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input custom-radio" type="radio" name="soal[{{ $soal->id }}]" id="pilihan_a_{{ $soal->id }}" value="a">
                                        <label class="form-check-label custom-bubble" for="pilihan_a_{{ $soal->id }}">
                                            <span class="icon">A</span> {{ $soal->pilihan_a }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input custom-radio" type="radio" name="soal[{{ $soal->id }}]" id="pilihan_b_{{ $soal->id }}" value="b">
                                        <label class="form-check-label custom-bubble" for="pilihan_b_{{ $soal->id }}">
                                            <span class="icon">B</span> {{ $soal->pilihan_b }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input custom-radio" type="radio" name="soal[{{ $soal->id }}]" id="pilihan_c_{{ $soal->id }}" value="c">
                                        <label class="form-check-label custom-bubble" for="pilihan_c_{{ $soal->id }}">
                                            <span class="icon">C</span> {{ $soal->pilihan_c }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input custom-radio" type="radio" name="soal[{{ $soal->id }}]" id="pilihan_d_{{ $soal->id }}" value="d">
                                        <label class="form-check-label custom-bubble" for="pilihan_d_{{ $soal->id }}">
                                            <span class="icon">D</span> {{ $soal->pilihan_d }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let currentQuestionIndex = 0;
    const questions = document.querySelectorAll('.question');
    const submitBtn = document.getElementById('subBtn');

    function showQuestion(index) {
        questions.forEach((question, idx) => {
            question.style.display = idx === index ? 'block' : 'none';
        });
    }

    showQuestion(currentQuestionIndex);

    // Countdown Timer
    let timeLeft = 1200;
    const countdownElement = document.getElementById('countdown');
    const progressElement = document.getElementById('progress');

    function updateCountdown() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        countdownElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        const progressWidth = (timeLeft / 600) * 100;
        progressElement.style.width = `${progressWidth}%`;

        if (timeLeft <= 0) {
            clearInterval(timer);
            countdownElement.textContent = "Waktu Habis!";
            progressElement.style.width = '0%';
            alert("Waktu telah habis! Silakan submit jawaban Anda.");
        } else {
            timeLeft--;
        }
    }

    const timer = setInterval(updateCountdown, 1000);
    updateCountdown(); // Panggil sekali untuk inisialisasi

    // SweetAlert untuk feedback jawaban
    document.querySelectorAll('.custom-radio').forEach(radio => {
        radio.addEventListener('change', function() {
            const selectedAnswer = this.value; // Jawaban yang dipilih
            const questionElement = this.closest('.question'); // Elemen pertanyaan
            const correctAnswer = questionElement.getAttribute('data-correct-answer'); // Jawaban benar dari data attribute

            if (selectedAnswer === correctAnswer) {
                Swal.fire({
                    icon: 'success',
                    title: 'Benar!',
                    text: 'Jawaban Anda benar.',
                    confirmButtonText: 'Lanjut',
                    willClose: () => {
                        if (currentQuestionIndex < questions.length - 1) {
                            currentQuestionIndex++;
                            showQuestion(currentQuestionIndex);
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Quiz selesai!',
                                text: 'Terima kasih telah mengerjakan kuis.',
                            });
                        }
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah!',
                    text: 'Jawaban Anda salah',
                    confirmButtonText: 'Lanjut',
                    willClose: () => {
                        if (currentQuestionIndex < questions.length - 1) {
                            currentQuestionIndex++;
                            showQuestion(currentQuestionIndex);
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Quiz selesai!',
                                text: 'Terima kasih telah mengerjakan kuis.',
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
