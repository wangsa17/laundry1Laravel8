@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#">datauser</a></li>
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
                        <a href="{{ route('userCreate') }}" class="btn btn-primary" style="margin-bottom: 10px"><i
                                class="fa fa-plus"></i>
                            Tambah Data</a>
                        <table id="tabel-data" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $us)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $us->nama }}</td>
                                        <td>{{ $us->username }}</td>
                                        <td>{{ $us->email }}</td>
                                        <td>{{ $us->role }}</td>
                                        <td>
                                            <a href="{{ route('userEdit', $us->id_user) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-id="{{ $us->id_user }}"
                                                data-nama="{{ $us->nama }}" class="btn btn-danger btn-sm hapusUs"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
        $('.hapusUs').click(function() {
            var usid = $(this).attr('data-id');
            var usnama = $(this).attr('data-nama');
            swal({
                    title: "Yakin Ingin Menghapus Data Ini?",
                    text: "Kamu akan menghapus data dengan nama " + usnama + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willdelete) => {
                    if (willdelete) {
                        window.location = "/admin/datauser/datakasir/delete/" + usid + ""
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
