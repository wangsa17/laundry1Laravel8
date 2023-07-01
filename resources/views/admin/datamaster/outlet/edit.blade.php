@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Edit
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Master</a></li>
            <li><a href="#">Outlet</a></li>
            <li class="active">Edit data</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Data {{ $menu }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('outletUpdate', $outlet->id_outlet) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama') ? old('nama') : $outlet->nama }}"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"
                                    placeholder="Masukkan Alamat">{{ old('alamat') ? old('alamat') : $outlet->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="number" class="form-control" name="tlp" id="tlp"
                                        value="{{ old('tlp') ? old('tlp') : $outlet->tlp }}"
                                        placeholder="Masukkan No Telepon">
                                </div><!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->

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
