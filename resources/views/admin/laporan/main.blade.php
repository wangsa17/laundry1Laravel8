@extends('admin.layout.app')
@section('content')
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
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $judul }}</h3>
                        <a href="#" class="btn btn-warning" onclick="window.print()" style="float: right"><i class="fa fa-print" style="margin-right: 6px"></i>Print</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {{-- <a href="{{route('laporanPenjualan')}}" class="btn btn-primary btn sm mb-2">Tambah Data
                        {{$judul}}</a> --}}
                        <table id="tabel-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Jumlah Transaksi</th>
                                    {{-- <th>Jumlah Pemasukan</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($transaksi as $key => $lp) --}}
                                @foreach ($paket as $key => $pak)
                                <tr>
                                    <td align="center">{{ $key + 1 }}</td>
                                    <td align="center">
                                        {{ $pak->nama_paket }}
                                    </td>
                                    <td align="center">
                                        {{ $pak->transaksi->count() }}
                                    </td>
                                    {{-- <td align="center"> --}}
                                        {{-- {{$paketsum}} --}}
                                        {{-- {{ $total }} --}}
                                        {{-- @foreach ($pak->transaksi_detail as $td)  --}}
                                        {{-- {{ $td->qty }} --}}
                                        {{-- {{ $td->total_harga }} --}}
                                        {{-- {{ $pak->transaksiDetail->qty }} --}}
                                         {{-- @endforeach --}}
                                    {{-- </td> --}}
                                </tr>
                                {{-- @endforeach --}}
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Jumlah Transaksi</th>
                                    {{-- <th>Jumlah Pemasukan</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
