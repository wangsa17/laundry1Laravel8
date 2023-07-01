@extends('user.layout.app')
@section('content')
    <section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
        <div class="section-overlay"
            style="opacity: 1; background-image: url('{{ asset('template-user/images/bg.jpg') }}'); background-position: center;background-size: cover;">
        </div>

        <div class="container" style="margin-top: 200px;">
            <div class="row">

                <div class="col-lg-7 col-12 text-center mx-auto">
                    <h1 class="cd-headline rotate-1 text-dark mb-4 pb-2">
                        {{-- <span>We clean your</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">House</b>
                            <b>Office</b>
                            <b>Kitchen</b>
                        </span> --}}
                    </h1>

                    <a class="custom-btn btn button button--atlas smoothscroll me-3" href="#paket
                    {{-- {{ route('paketUser') }} --}}
                    ">
                        <span>Paket</span>

                        <div class="marquee" aria-hidden="true">
                            <div class="marquee__inner">
                                <span>Paket</span>
                                <span>Paket</span>
                                <span>Paket</span>
                                <span>Paket</span>
                            </div>
                        </div>
                    </a>
                    <a class="custom-btn custom-border-btn custom-btn-bg-dark btn button button--pan smoothscroll"
                        href="{{ route('pesan', Auth::id()) }}">
                        <span>Pesan</span>
                    </a>
                </div>

            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L40,229.3C80,235,160,245,240,250.7C320,256,400,256,480,240C560,224,640,192,720,176C800,160,880,160,960,138.7C1040,117,1120,75,1200,80C1280,85,1360,139,1400,165.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </section>

    <section class="services-section section-padding section-bg" id="paket" style="background-color: #fff;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h2 class="mb-4">Paket</h2>
                </div>

                @foreach ($paket as $p)
                    <div class="col-lg-6 col-12">
                        <div class="services-thumb" style="background-color: #F0F8FF;">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="#">
                                            <img src="{{ asset('template-user/images/laundry/paket1.jpg') }}"
                                                class="services-image img-fluid" alt="">

                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i>
                                                        Rp.{{ $p->harga }}
                                                    </p>

                                                    {{-- <p class="text-white mb-0">
                                                    <i class="bi-clock-fill me-2"></i>
                                                    5 hrs
                                                </p> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="#">
                                                {{ $p->nama_paket }}
                                            </a>
                                        </h4>

                                        <p>{{ $p->deskripsi }}</p>

                                        <div class="d-flex flex-wrap align-items-center">

                                            {{-- <a href="#" class="custom-btn btn button button--atlas mt-2 ms-auto">
                                                <span> Pilih Paket</span>

                                                <div class="marquee" aria-hidden="true">
                                                    <div class="marquee__inner">
                                                        <span> Pilih Paket</span>
                                                        <span> Pilih Paket</span>
                                                        <span> Pilih Paket</span>
                                                        <span> Pilih Paket</span>
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

    {{-- <section class="services-section section-padding section-bg" id="services-section" style="background-color: #F0F8FF;">
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
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                            </div>

                                            <a href="#" class="custom-btn btn button button--atlas mt-2 ms-auto pilih">
                                                <span> Pilih outlet</span>

                                                <div class="marquee" aria-hidden="true">
                                                    <div class="marquee__inner">
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                        <span> Pilih outlet</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section> --}}

    <section class="testimonial-section section-padding section-bg" id="">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="text-white mb-4">Outlet</h2>
                </div>

                @foreach ($outlet as $out)
                <div class="col-lg-4 col-12">
                        <div class="featured-block">
                            <div class="d-flex align-items-center mb-3">
                                <div class="services-image-wrap" style="width: 100px">
                                    <a href="#">
                                        <img src="{{ asset('template-user/images/laundry/paket.png') }}"
                                            class="services-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="ms-3">
                                    <h4 class="mb-0" style="font-size: 24px">{{ $out->nama }}</h4>

                                    {{-- <div class="reviews-icons mb-1">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star"></i>
                                    </div> --}}
                                    <p class="mb-0">{{ $out->tlp }}</p>
                                </div>
                            </div>
                            <p class="mb-0">{{ $out->alamat }}</p>

                        </div>
                    </div>
                    @endforeach

                {{-- <div class="col-lg-4 col-12">
                    <div class="featured-block">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('template-user/images/avatar/happy-customer-03.jpg') }}"
                                class="avatar-image img-fluid">

                            <div class="ms-3">
                                <h4 class="mb-0">Elon</h4>

                                <div class="reviews-icons mb-1">
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                </div>
                            </div>
                        </div>

                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="featured-block mb-lg-0">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('template-user/images/avatar/happy-customer-04.jpg') }}"
                                class="avatar-image img-fluid">

                            <div class="ms-3">
                                <h4 class="mb-0">Josh</h4>

                                <div class="reviews-icons mb-1">
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star"></i>
                                    <i class="bi-star"></i>
                                </div>
                            </div>
                        </div>

                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="featured-block">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('template-user/images/avatar/happy-customer-05.jpg') }}"
                                class="avatar-image img-fluid">

                            <div class="ms-3">
                                <h4 class="mb-0">Katie</h4>

                                <div class="reviews-icons mb-1">
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                </div>
                            </div>
                        </div>

                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="featured-block mb-lg-0">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('template-user/images/avatar/happy-customer-06.jpg') }}"
                                class="avatar-image img-fluid">

                            <div class="ms-3">
                                <h4 class="mb-0">Shai</h4>

                                <div class="reviews-icons mb-1">
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star"></i>
                                    <i class="bi-star"></i>
                                </div>
                            </div>
                        </div>

                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.</p>
                    </div>
                </div> --}}

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
                    <img src="{{ asset('template-user/images/partners/toprak-leasing.svg') }}"
                        class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/glorix.svg') }}" class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/woocommerce.svg') }}"
                        class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/rolf-leasing.svg') }}"
                        class="partners-image img-fluid">
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('template-user/images/partners/unilabs.svg') }}" class="partners-image img-fluid">
                </div>

            </div>
        </div>
    </section>
@endsection
