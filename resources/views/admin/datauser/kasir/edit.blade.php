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
            <li><a href="#">datakasir</a></li>
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
                    <form method="post" action="{{ route('userUpdate', $user->id_user) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama') ? old('nama') : $user->nama }}"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ old('username') ? old('username') : $user->username }}"
                                    placeholder="Masukkan username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ old('email') ? old('email') : $user->email }}" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">*Isi jika ingin merubah
                                        password</span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Masukkan password">
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
                            <a href="{{ route('user') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
