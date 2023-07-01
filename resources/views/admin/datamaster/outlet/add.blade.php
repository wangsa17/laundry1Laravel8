@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Master</a></li>
            <li><a href="#">Outlet</a></li>
            <li class="active">tambah data</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data {{ $menu }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('outletStore') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" value="{{ old('alamat') }}"
                                    placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="number" class="form-control" name="tlp" id="tlp"
                                        value="{{ old('tlp') }}" placeholder="Masukkan No Telepon">
                                </div><!-- /.input group -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('outlet') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
