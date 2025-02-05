<style>
    @media (max-width: 576px) {
    .navbar-brand span {
        font-size: 16px; /* Ukuran lebih kecil lagi untuk layar kecil */
    }
}
</style>
<div class="container-fluid position-relative shadow" style="background: #3b546e">
    <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-0 px-lg-5" style="background: #3b546e">
        <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
            <img src="{{ asset('landing/img/logo.png') }}" alt="" width="90" height="50">
            <span style="color: yellow">SMP Putri Cahaya Medan</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ route('landing.index') }}" class="nav-item nav-link {{ \Route::is('landing.index') ? 'active' : '' }}">Home</a>
                <a href="{{ route('landing.about') }}" class="nav-item nav-link {{ \Route::is('landing.about') ? 'active' : '' }}">About</a>
                <a href="{{ route('landing.tips') }}" class="nav-item nav-link {{ \Route::is('landing.tips') ? 'active' : '' }}">Isi Kuis</a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary px-4">Join Class</a>
        </div>
    </nav>
</div>
