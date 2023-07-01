@extends('admin.layout.app')

@section('content')
<section class="content-header">
    <h1>
        Detail {{ $judul }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
        <li class="active">Detail Data</li>
    </ol>
</section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Detail {{ $judul }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('transaksiStore') }}" enctype="multipart/form-data">
                            @csrf
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
                                                    $jumlah = $td->qty * $td->paket->harga + $transaksi->biaya_tambahan + $transaksi->pajak;
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
                                                <td><b> Rp. {{ number_format($td->total_bayar ? $td->total_bayar : '-', 0, '.', '.') }}</b>
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
                                                                                class="float-right text-danger">
                                                                                {{ $td->qty }} Kilogram</span></b>
                                                                    </h6>
                                                                    <h6>{{ $td->paket->nama_paket }} <span
                                                                            class="float-right text-danger"><b>Rp.
                                                                                {{ number_format($td->paket->harga, 0, '.', '.') }}</b></span>
                                                                    </h6>
                                                                    <p style="font-size: 14px" class="mb-3">Berat
                                                                        ({{ $td->qty }})
                                                                        x
                                                                        {{ number_format($td->paket->harga, 0, '.', '.') }}
                                                                        <span class="float-right text-danger">Rp.
                                                                            {{ number_format($td->qty * $td->paket->harga, 0, '.', '.') }}</span>
                                                                    </p>
                                                                    <h6 class="mb-3">Biaya Tambahan <b><span
                                                                                class="float-right text-danger"> Rp.
                                                                                {{ number_format($transaksi->biaya_tambahan, 0, '.', '.') }}</span></b>
                                                                    </h6>
                                                                    <h6 class="mb-3">Pajak <b><span
                                                                                class="float-right text-danger"> Rp.
                                                                                {{ number_format($transaksi->pajak, 0, '.', '.') }}</span></b>
                                                                    </h6>
                                                                    <h6 class="mb-3">Diskon <b><span
                                                                                class="float-right text-danger">
                                                                                {{ number_format($transaksi->diskon, 0, '.', '.') }}
                                                                                %</span></b></h6>
                                                                                @php
                                                                                // $diskon = (($td->paket->harga + $td->) * $transaksi->diskon/100);
                                                                                @endphp

                                                                    <h6>Total <b><span class="float-right text-danger"> Rp.
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


                            {{-- <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('transaksi') }}" class="btn btn-warning">Kembali</a>
                            @if ($transaksi->status_transaksi == 'Pending' || $transaksi->status_transaksi == 'Selesai')
                                <a href="{{ route('transaksiTolak', $transaksi->id_transaksi) }}"
                                    class="btn btn-danger float-right"
                                    onclick="return confirm('Apakah anda ingin menolak Transaksi ini?')">Tolak</a>
                                @if ($transaksi->status_transaksi == 'Pending')
                                    <a href="{{ route('transaksiProses', $transaksi->id_transaksi) }}"
                                        class="btn btn-primary float-right mr-2"
                                        onclick="return confirm('Apakah anda ingin memproses Transaksi ini?')">Proses</a>
                                @endif
                            @elseif ($transaksi->status_transaksi == 'Proses Admin')
                                <a href="{{ route('transaksiKirim', $transaksi->id_transaksi) }}"
                                    class="btn btn-warning float-right mr-2"
                                    onclick="return confirm('Apakah anda ingin mengirim Transaksi ini?')">Kirim</a>
                            @elseif ($transaksi->status_transaksi == 'Pengiriman')
                                <a href="{{ route('transaksiSelesai', $transaksi->id_transaksi) }}"
                                    class="btn btn-success float-right mr-2"
                                    onclick="return confirm('Apakah anda ingin menyelesaikan Transaksi ini?')">Selesai</a>
                            @endif --}}
                            <div class="box-footer">

                                <a href="{{ route('transaksiStatusProses', $transaksi->id_transaksi) }}"
                                    class="btn btn-primary ml-1"
                                    onclick="return confirm('Apakah anda ingin memproses transaksi ini?')">Proses</a>
                                <a href="{{ route('transaksiStatusKirim', $transaksi->id_transaksi) }}"
                                    class="btn btn-default ml-1"
                                    onclick="return confirm('Apakah anda ingin mengirim transaksi ini?')">Diambil</a>
                                <a href="{{ route('transaksiStatusSelesai', $transaksi->id_transaksi) }}"
                                    class="btn btn-success ml-1"
                                    onclick="return confirm('Apakah anda ingin menyelesaikan transaksi ini?')">Selesai</a>
                                    @if ($transaksi->status_transaksi == 'Baru')
                                    <a href="{{ route('transaksi') }}" class="btn btn-warning ml-1">Kembali</a>
                                    @endif
                                    @if ($transaksi->status_transaksi == 'Proses')
                                    <a href="{{ route('transaksiMainProses') }}" class="btn btn-warning ml-1">Kembali</a>
                                    @endif
                                    @if ($transaksi->status_transaksi == 'Selesai')
                                    <a href="{{ route('transaksiMainSelesai') }}" class="btn btn-warning ml-1">Kembali</a>
                                    @endif
                                    @if ($transaksi->status_transaksi == 'Diambil')
                                    <a href="{{ route('transaksiMainDiambil') }}" class="btn btn-warning ml-1">Kembali</a>
                                    @endif

                                {{-- @if ($transaksi->status_transaksi == 'Baru' || $transaksi->status_transaksi == 'Selesai') --}}
                                {{-- <a href="{{route('transaksiTolak',$transaksi->id_transaksi)}}" class="btn btn-danger float-right" onclick="return confirm('Apakah anda ingin menolak transaksi ini?')">Tolak</a> --}}
                                {{-- @if ($transaksi->status_transaksi == 'Pending') --}}
                                {{-- @endif --}}
                                {{-- @elseif ($transaksi->status_transaksi == 'Proses Admin') --}}
                                {{-- @elseif ($transaksi->status_transaksi == 'Pengiriman') --}}
                                {{-- @endif --}}
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@stop
