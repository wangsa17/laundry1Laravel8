@extends('user.layout.app')
@section('content')
<main>

    <section class="banner-section d-flex justify-content-center align-items-end"
        style="background-image: url('{{ asset('template-user/images/laundry/banner.png') }}');">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <h1 class="text-white mb-lg-0">Detail Riwayat</h1>
                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('history') }}">Riwayat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Riwayat</li>
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
                    <form class="custom-form consulting-form bg-white shadow-lg mb-5 mb-lg-0"
                        action="{{ route('pesanProses') }}" method="post" role="form">
                        @csrf
                        <div class="consulting-form-header d-flex align-items-center">
                            <h3 class="mb-4">Detail Riwayat Pesanan</h3>
                        </div>

                        <div class="consulting-form-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>Kode Transaksi</td>
                                                <td><b>{{ $transaksi->kode_transaksi ? $transaksi->kode_transaksi : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kode Invoice</td>
                                                <td><b>{{ $transaksi->kode_invoice ? $transaksi->kode_invoice : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pelanggan</td>
                                                <td><b>{{ $transaksi->member->nama ? $transaksi->member->nama : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Outlet</td>
                                                <td><b>{{ $transaksi->outlet->nama ? $transaksi->outlet->nama : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kasir</td>
                                                <td><b>{{ $transaksi->user->nama ? $transaksi->user->nama : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Transaksi</td>
                                                <td class="text-success">
                                                    <b>{{ $transaksi->tgl ? $transaksi->tgl : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Selesai</td>
                                                <td class="text-warning">
                                                    <b>{{ $transaksi->tgl_selesai ? $transaksi->tgl_selesai : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Bayar</td>
                                                <td class="text-primary">
                                                    <b>{{ $transaksi->tgl_bayar ? $transaksi->tgl_bayar : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status Transaksi</td>
                                                <td><b>{{ $transaksi->status_transaksi ? $transaksi->status_transaksi : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status Pembayaran</td>
                                                <td><b>{{ $transaksi->status_pembayaran ? $transaksi->status_pembayaran : '-' }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                @foreach ($transaksi->transaksiDetail as $td)
                                                @php
                                                $jumlah = $td->qty * $td->paket->harga + $transaksi->biaya_tambahan +
                                                $transaksi->pajak;
                                                $getdiskon = ($jumlah * $transaksi->diskon) / 100;
                                                $total = $jumlah - $getdiskon;
                                                @endphp
                                                @endforeach
                                                <td>Total Jumlah Harga</td>
                                                <td><b class="text-danger">Rp.
                                                        {{ $total ? number_format($total, 0, '.', '.') : '-' }}</b>
                                                </td>
                                            </tr>
                                            @if ($transaksi->status_pembayaran == 'Dibayar')
                                            <tr>
                                                <td>Jumlah Pembayaran</td>
                                                @foreach ($transaksi->transaksiDetail as $td)
                                                <td><b> Rp.
                                                        {{ number_format($td->total_bayar ? $td->total_bayar : '-', 0, '.', '.') }}</b>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($transaksi->transaksiDetail as $td)
                                                @php
                                                $kembalian = $td->total_bayar - $td->total_harga;
                                                @endphp
                                                @endforeach
                                                <td>Kembalian</td>
                                                @foreach ($transaksi->transaksiDetail as $td)
                                                <td><b> Rp. {{ number_format($kembalian, 0, '.', '.') }}</b>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4>Detail Transaksi</h4>
                                        <div class="row">
                                            @foreach ($transaksi->transaksiDetail as $td)
                                            <div class="col-lg-12">
                                                <div class="box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="p-2">
                                                                <h6 class="mb-3">Berat <b><span
                                                                            class="text-danger" style="float: right;">
                                                                            {{ $td->qty }} Kilogram</span></b>
                                                                </h6>
                                                                <h6>{{ $td->paket->nama_paket }} <span
                                                                        class="text-danger" style="float: right;"><b>Rp.
                                                                            {{ number_format($td->paket->harga, 0, '.', '.') }}</b></span>
                                                                </h6>
                                                                <p style="font-size: 14px" class="mb-3">Berat
                                                                    ({{ $td->qty }})
                                                                    x
                                                                    {{ number_format($td->paket->harga, 0, '.', '.') }}
                                                                    <span class="text-danger" style="float: right;">Rp.
                                                                        {{ number_format($td->qty * $td->paket->harga, 0, '.', '.') }}</span>
                                                                </p>
                                                                <h6 class="mb-3">Biaya Tambahan <b><span
                                                                            class="text-danger" style="float: right;"> Rp.
                                                                            {{ number_format($transaksi->biaya_tambahan, 0, '.', '.') }}</span></b>
                                                                </h6>
                                                                <h6 class="mb-3">Pajak <b><span
                                                                            class="text-danger" style="float: right;"> Rp.
                                                                            {{ number_format($transaksi->pajak, 0, '.', '.') }}</span></b>
                                                                </h6>
                                                                <h6 class="mb-3">Diskon <b><span
                                                                            class="text-danger" style="float: right;">
                                                                            {{ number_format($transaksi->diskon, 0, '.', '.') }}
                                                                            %</span></b></h6>
                                                                @php
                                                                // $diskon = (($td->paket->harga + $td->) *$transaksi->diskon/100);
                                                                @endphp

                                                                <h6>Total <b><span class="text-danger" style="float: right;"> Rp.
                                                                            {{ number_format($total, 0, '.', '.') }}</span></b>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                @if ($transaksi->status_transaksi == 'Selesai')
                                <a href="{{ route('bayarUser', $transaksi->id_transaksi) }}" class="btn btn-success">Bayar</a>
                                @endif
                                <a href="{{ route('history') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
