@extends('user.layout.app')
@section('content')
<main>

    <section class="banner-section d-flex justify-content-center align-items-end" style="background-image: url('{{ asset('template-user/images/laundry/banner.png') }}');">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <h1 class="text-white mb-lg-0">Bayar</h1>
                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Bayar</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <form class="custom-form consulting-form bg-white shadow-lg mb-5 mb-lg-0" action="{{ route('bayarStoreUser') }}" method="post" role="form">
                        @csrf
                        <div class="consulting-form-header d-flex align-items-center">
                            <h3 class="mb-4">Bayar Sekarang</h3>
                        </div>

                        <div class="consulting-form-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-12">
                                <input type="hidden" name="id_transaksi" class="form-control" value="{{ old('id_transaksi')?old('id_transaksi'):$transaksi->id_transaksi }}">
                                    <label for="">Kode Invoice</label>
                                    <input type="text" name="kode_invoice" id="kode_invoice" value="{{ old('kode_invoice') ? old('kode_invoice'): $transaksi->kode_invoice }}" class="form-control" required disabled>
                                </div>

                                <div class="col-lg-12 col-md-6 col-12">
                                    <label for="">Nama</label>
                                    <input type="nama" name="nama" id="nama" value="{{ old('nama') ? old('nama'): Auth::user()->nama }}" pattern="[^ @]*@[^ @]*" class="form-control" required disabled>
                                </div>
                                <div class="col-lg-12 col-md-6 col-12">
                                    @foreach ($transaksi->transaksiDetail as $td)
                                    @php
                                        // $diskon = (($td->paket->harga + $td->) * $transaksi->diskon/100);
                                        $jumlah = $td->qty * $td->paket->harga + $transaksi->biaya_tambahan + $transaksi->pajak;
                                        $getdiskon = ($jumlah * $transaksi->diskon) / 100;
                                        $total = $jumlah - $getdiskon;
                                    @endphp
                                @endforeach
                                <label for="total_harga">Total Harga</label>
                                <input type="text" name="total_harga" class="form-control" id="total_harga"
                                    value="Rp. {{ number_format($total, 0, '.', '.') }}" placeholder="Masukkan Jumlah"
                                    disabled>
                                    <input type="hidden" name="total_harga" class="form-control" id="total_harga"
                                    value="{{ $total }}" placeholder="Masukkan Jumlah"
                                    >
                                </div>
                                <div class="col-lg-12 col-md-6 col-12">
                                    <label for="">Jumlah Pembayaran</label>
                                    <input type="number" name="total_bayar" id="total_bayar" value="{{ old('total_bayar')}}" class="form-control" required>
                                </div>
                            </div>

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
