@extends('user.layout.app')
@section('content')
<main>

    <section class="banner-section d-flex justify-content-center align-items-end"
        style="background-image: url('{{ asset('template-user/images/laundry/banner.png') }}');">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <h1 class="text-white mb-lg-0">Riwayat</h1>
                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
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
                            <h3 class="mb-4">Riwayat Pesanan</h3>
                        </div>

                        <div class="consulting-form-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-12">
                                    <table class="table table-stripes">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nama Outlet</th>
                                                <th>Nama Paket</th>
                                                <th>Tanggal</th>
                                                <th>Status Transaksi</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $key => $tr)
                                                <tr>
                                                    <td>{{ $key + 1}}</td   >
                                                    <td>{{ $tr->member->nama}}</td>
                                                    <td>{{ $tr->outlet->nama}}</td>
                                                    <td>{{ $tr->paket->nama_paket}}</td>
                                                    <td>{{ $tr->tgl}}</td>
                                                    <td>{{ $tr->status_transaksi}}</td>
                                                    <td>{{ $tr->status_pembayaran}}</td>
                                                    <td>
                                                        <a href="{{ route('detailhistory', $tr->id_transaksi) }}" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nama Outlet</th>
                                            <th>Nama Paket</th>
                                            <th>Tanggal</th>
                                            <th>Status Transaksi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
