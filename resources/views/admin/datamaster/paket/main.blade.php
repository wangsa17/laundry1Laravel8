@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#">Data Master</a></li>
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
                        <a href="{{ route('paketCreate') }}" class="btn btn-primary" style="margin-bottom: 10px"><i
                                class="fa fa-plus"></i>
                            Tambah Data</a>
                        <table id="tabel-data" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paket as $key => $us)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $us->nama_paket }}</td>
                                        <td>{{ $us->harga }}</td>
                                        <td>{{ $us->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('paketEdit', $us->id_paket) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-id="{{ $us->id_paket }}"
                                                data-nama="{{ $us->nama_paket }}" class="btn btn-danger btn-sm hapusPak"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
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
        $('.hapusPak').click(function() {
            var pakid = $(this).attr('data-id');
            var paknama = $(this).attr('data-nama');
            swal({
                    title: "Yakin Ingin Menghapus Data Ini?",
                    text: "Kamu akan menghapus data dengan nama " + paknama + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willdelete) => {
                    if (willdelete) {
                        window.location = "/admin/datamaster/datapaket/delete/" + pakid + ""
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
