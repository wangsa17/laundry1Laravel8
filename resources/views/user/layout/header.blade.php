<header class="site-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-house-fill me-2"></i>
                    {{-- {{ $outlet->nama }} --}}
                </p>

                <p class="d-flex d-lg-block d-md-block d-none me-4 mb-0">
                    <i class="bi-clock-fill me-2"></i>
                    <strong class="me-2">Mon - Fri</strong> 8:00 AM - 5:30 PM
                </p>

                <p class="site-header-icon-wrap text-white d-flex mb-0 ms-auto">
                    @if (Auth::check())
                        <i class="bi-person" style="margin-right: 5px"></i>
                        {{ Auth::user()->nama }}
                        |
                        <a href="#" style="margin-left: 5px" class="logout">Logout</a>
                    @else
                        <a href="{{ route('loginMember') }}"><i class="icon-user"></i>Login</a>
                    @endif


                    {{-- <a href="tel: 110-220-9800" class="text-white">
                        110 220 9800
                    </a> --}}
                </p>
            </div>

        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg" style="background-color: #000; opacity: 0.5;padding: 5px 0 5px 0;position: absolute;">
    <div class="container" style="opacity: 1;">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('template-user/images/bubbles.png') }}" style="opacity: 1;" class="logo img-fluid" alt="">

            <span class="ms-2">Laundry</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paketUser') }}">Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('outletUser') }}">Outlet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesan', Auth::id()) }}">Pesan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('history', Auth::id()) }}">Riwayat Pesanan</a>
                </li>

                {{-- <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn" href="#">Get
                        started</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
