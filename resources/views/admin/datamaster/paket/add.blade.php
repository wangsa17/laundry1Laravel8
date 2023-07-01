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
            <li><a href="#">paket</a></li>
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
                    <form method="post" action="{{ route('paketStore') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_paket">Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control" id="nama_paket"
                                    value="{{ old('nama_paket') }}" placeholder="Masukkan Nama Paket">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga"
                                    value="{{ old('harga') }}" placeholder="Masukkan Harga">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="2" class="form-control"
                                    value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('paket') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
