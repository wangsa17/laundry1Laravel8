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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Table {{ $judul }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <a href="{{ route('transaksiCreate') }}" class="btn btn-primary" style="margin-bottom: 10px"><i
                                class="fa fa-plus"></i>
                            Tambah Data</a>
                        <div class="btn-group btn-group-justified" style="margin-bottom: 10px" role="group"
                            aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksi') }}" class="btn btn-primary">Baru</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksiMainProses') }}" class="btn btn-default">Proses</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksiMainSelesai') }}" class="btn btn-default">Selesai</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksiMainDiambil') }}" class="btn btn-default">Diambil</a>
                            </div>
                        </div>
                        <table id="tabel-data" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Member</th>
                                    <th>Nama Outlet</th>
                                    <th>Tanggal</th>
                                    <th>Status Transaksi</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $key => $us)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $us->kode_transaksi }}</td>
                                        <td>{{ $us->member->nama }}</td>
                                        <td>{{ $us->outlet->nama }}</td>
                                        <td>{{ $us->tgl }}</td>
                                        <td>{{ $us->status_transaksi }}</td>
                                        <td>{{ $us->status_pembayaran }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Aksi  <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('transaksiShow', $us->id_transaksi) }}"><i
                                                                class="fa fa-eye" style="margin-right: 5px"></i>Detail</a>
                                                    </li>
                                                    {{-- <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('transaksiEdit', $us->id_transaksi) }}"><i
                                                                class="fa fa-edit" style="margin-right: 5px"></i>Edit</a>
                                                    </li> --}}
                                                    @if ($us->status_pembayaran == 'Dibayar')
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('transaksiNota', $us->id_transaksi) }}"><i
                                                                    class="fa fa-print" style="margin-right: 5px"></i>Print
                                                                Nota</a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item hapurTra" href="#"
                                                            data-id="{{ $us->id_transaksi }}"
                                                            data-nama="{{ $us->member->nama }}"><i class="fa fa-trash"
                                                                style="margin-right: 5px"></i>Hapus</a>
                                                    </li>
                                                </div>
                                            </div>
                                            {{-- <a href="{{ route('transaksiEdit', $us->id_transaksi) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-id="{{ $us->id_transaksi }}"
                                                data-nama="{{ $us->nama_transaksi }}"
                                                class="btn btn-danger btn-sm hapusPak"><i class="fa fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Member</th>
                                    <th>Nama Outlet</th>
                                    <th>Tanggal</th>
                                    <th>Status Transaksi</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
@section('script')
    <script>
        $("#tabel-data").DataTable();
    </script>
    <script>
        $('.hapurTra').click(function() {
            var traid = $(this).attr('data-id');
            var tranama = $(this).attr('data-nama');
            swal({
                    title: "Yakin Ingin Menghapus Data Ini?",
                    text: "Kamu akan menghapus data dengan nama " + tranama + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willdelete) => {
                    if (willdelete) {
                        window.location = "/admin/transaksi/delete/" + traid + ""
                        swal("Data Berhasil Dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script>
@endsection
