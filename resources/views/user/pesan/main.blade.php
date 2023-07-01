@extends('user.layout.app')
@section('content')
<main>

    <section class="banner-section d-flex justify-content-center align-items-end" style="background-image: url('{{ asset('template-user/images/laundry/banner.png') }}');">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <h1 class="text-white mb-lg-0">Pesan</h1>
                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">
{{--
                <div class="col-lg-5 col-12 me-auto mb-lg-0 mb-5">
                    <h2 class="my-3">We're happy to help</h2>

                    <p>Best Cleaning Service is ready to serve you. Clean Work is a professional website layout for your business.</p>

                    <div class="contact-info bg-white shadow-lg">
                        <h3 class="mb-4">Contact Information</h3>

                        <h5 class="d-flex mt-3 mb-3">
                            <i class="bi-geo-alt-fill custom-icon me-3"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </h5>

                        <h5 class="d-flex mb-3">
                            <i class="bi-telephone-fill custom-icon me-3"></i>

                            <a href="tel: 110-220-9800">
                                110-220-9800
                            </a>
                        </h5>

                        <h5 class="d-flex">
                            <i class="bi-envelope-fill custom-icon me-3"></i>

                            <a href="mailto:info@company.com">
                                info@company.com
                            </a>
                        </h5>
                    </div>
                </div> --}}

                <div class="col-lg-12 col-12">
                    <form class="custom-form consulting-form bg-white shadow-lg mb-5 mb-lg-0" action="{{ route('pesanProses') }}" method="post" role="form">
                        @csrf
                        <div class="consulting-form-header d-flex align-items-center">
                            <h3 class="mb-4">Pesan Sekarang</h3>
                        </div>

                        <div class="consulting-form-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" id="name" value="{{ old('nama') ? old('nama'): Auth::user()->nama }}" class="form-control" required disabled>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('nama') ? old('nama'): Auth::user()->email }}" pattern="[^ @]*@[^ @]*" class="form-control" required disabled>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" value="{{ old('username') ? old('username'): Auth::user()->username }}" class="form-control" required disabled>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="">No Telepon</label>
                                    <input type="number" name="tlp" id="tlp" value="{{ old('tlp') ? old('tlp'): Auth::user()->tlp }}" pattern="[^ @]*@[^ @]*" class="form-control" required disabled>
                                </div>
                            </div>

                            <label for="">PAKET</label>
                            <select class="form-select form-control" name="paket" id="paket" aria-label="Default select example" required>
                                <option value=""> == PILIH PAKET ==</option>
                                @foreach ($paket as $p)
                                <option value="{{ $p->id_paket }}">{{ $p->nama_paket }} ({{ $p->harga }})</option>
                                @endforeach
                            </select>

                            <label for="">Berat <span class="text-danger">(Satuan KG)</span></label>
                            <input type="number" name="qty" id="qty" class="form-control">

                            <label for="">OUTLET</label>
                            <select class="form-select form-control" name="outlet" id="outlet" aria-label="Default select example" required>
                                <option value=""> == PILIH OUTLET ==</option>
                                @foreach ($outlet as $p)
                                <option value="{{ $p->id_outlet }}">{{ $p->nama }} ({{ $p->alamat }})</option>
                                @endforeach
                            </select>

                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" id="alamat" required disabled>{{ old('alamat')?old('alamat'):Auth::user()->alamat }}</textarea>

                            <input type="hidden" name="tgl" id="tgl" value="{{ date('Y-m-d') }}">
                            <div class="col-lg-6 col-md-10 col-8 mx-auto">
                                <button type="submit" class="form-control">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
