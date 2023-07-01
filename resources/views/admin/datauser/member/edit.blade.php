@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Edit
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">datauser</a></li>
            <li><a href="#">datamember</a></li>
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
                    <form method="post" action="{{ route('memberUpdate', $member->id_member) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama') ? old('nama') : $member->nama }}"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ old('username') ? old('username') : $member->username }}"
                                    placeholder="Masukkan username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ old('email') ? old('email') : $member->email }}" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">*Isi jika ingin merubah
                                        password</span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Masukkan password">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"
                                    placeholder="Masukkan Alamat">{{ old('alamat') ? old('alamat') : $member->alamat }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="{{ $member->jenis_kelamin }}">{{ $member->jenis_kelamin }}</option>
                                    <option value="">.:: Pilih Jenis Kelamin::.</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tlp">No Telepon</label>
                                <input type="number" name="tlp" class="form-control" id="tlp"
                                    value="{{ old('tlp') ? old('tlp') : $member->tlp }}" placeholder="Masukkan No Telepon">
                            </div>
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
