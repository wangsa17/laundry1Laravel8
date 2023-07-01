@extends('user.layout.app')
@section('content')
<main>

    <section class="banner-section d-flex justify-content-center align-items-end" style="background-image: url('{{ asset('template-user/images/laundry/banner2.png') }}')">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <h1 class="text-white mb-lg-0">List Outlet</h1>
                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">List Outlet</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>

    <section class="services-section section-padding section-bg" id="services-section" style="background-color: #F0F8FF;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h2 class="mb-4">Outlet</h2>
                </div>

                @foreach ($outlet as $p)
                    <div class="col-lg-6 col-12">
                        <div class="services-thumb" style="background-color: #fff;">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="#">
                                            <img src="{{ asset('template-user/images/laundry/paket.png') }}"
                                                class="services-image img-fluid" alt="">

                                            {{-- <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i>
                                                        Rp.{{ $p->harga }}
                                                    </p>

                                                    <p class="text-white mb-0">
                                                    <i class="bi-clock-fill me-2"></i>
                                                    5 hrs
                                                </p>
                                                </div>
                                            </div> --}}
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="#">
                                                {{ $p->nama }}
                                            </a>
                                        </h4>

                                        <p>{{ $p->alamat }}</p>
                                        <p>{{ $p->tlp }}</p>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="reviews-icons">
                                                {{-- <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i> --}}
                                            </div>

                                            {{-- <a href="#" class="custom-btn btn button button--atlas mt-2 ms-auto pilih">
                                                <span> Pilih outlet</span>

                                                <div class="marquee" aria-hidden="true">
                                                    <div class="marquee__inner">
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                    </div>
                                                </div>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <section class="partners-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-12 col-12">
                    <h4 class="partners-section-title bg-white shadow-lg">Trusted by companies</h4>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/toprak-leasing.svg')}}" class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/glorix.svg')}}" class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/woocommerce.svg')}}" class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/rolf-leasing.svg')}}" class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/unilabs.svg')}}" class="partners-image img-fluid">
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
@section('script')

@endsection
