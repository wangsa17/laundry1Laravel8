@extends('admin.layout.app')
@section('content')
{{-- <div class="content-wrapper"> --}}
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Data {{ $judul }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                {{-- <div class="col-md-9"> --}}
                    <!-- general form elements -->
                    <div class="col-12 text-center">
                        <div class="white-box" style="background: white; padding: 20px 0 20px 0">
                            <img src="{{ asset('template-user/images/logo.png') }}" alt="" style="width: 150px">
                        </div>
                        <div class="mt-3">
                            <h2 style="color: seagreen;font-weight: 900">NOTA PEMBAYARAN</h2>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        @php
                        $kembalian = $transaksiDetail->total_bayar - $transaksiDetail->total_harga;
                    @endphp
                        <h4>Pesanan Atas Nama {{ $transaksi->member->nama }} Berhasil Dibayar</h4>
                        <br>
                        <strong>Kode Invoice: {{ $transaksi->kode_invoice }}</strong>
                        <br>
                        <br>
                        <strong>Total Harga: Rp. {{number_format($transaksiDetail->total_harga, 0, '.', '.')}}</strong>
                        <br>
                        <strong>Total Pembayaran: Rp. {{number_format($transaksiDetail->total_bayar, 0, '.', '.')}}</strong>
                        <br>
                        <strong>Kembalian: Rp. {{number_format($kembalian, 0, '.', '.')}}</strong>
                        <br>
                        <br>

                        <a href="{{ route('transaksiMainDiambil') }}" class="btn btn-warning" style="margin-right: 6px">Kembali</a>
                        <a href="#" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print" style="margin-right: 6px"></i>Print</a>
                    </div>
                    <!-- /.card -->

                {{-- </div> --}}
            </div>
        </div>
        </div>
    </section>
{{-- </div> --}}

@endsection
