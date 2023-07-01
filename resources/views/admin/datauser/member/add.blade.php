@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">datauser</a></li>
            <li><a href="#">datamember</a></li>
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
                    <form method="post" action="{{ route('memberStore') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ old('username') }}" placeholder="Masukkan username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Masukkan password">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" value="{{ old('alamat') }}" class="form-control"
                                    placeholder="Masukkan Alamat"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">.:: Pilih Jenis Kelamin::.</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tlp">No Telepon</label>
                                <input type="number" name="tlp" class="form-control" id="tlp"
                                    value="{{ old('tlp') }}" placeholder="Masukkan No Telepon">
                            </div>
                            {{-- <div class="form-group">
                                <label for="outlet"> Nama Outlet</label>
                                <select name="outlet" id="outlet" class="form-control">
                                    <option value="">.:: Pilih Outlet::.</option>
                                    @foreach ($outlet as $out)
                                        <option value="{{ $out->id_outlet }}">{{ $out->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('member') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
