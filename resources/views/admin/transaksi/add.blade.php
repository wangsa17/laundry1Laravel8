@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
            <li class="active">Tambah Data</li>
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
                    <form method="post" action="{{ route('transaksiStore') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="outlet"> Nama Outlet</label>
                                <select name="outlet" id="outlet" class="form-control">
                                    <option value="">.:: Pilih Outlet::.</option>
                                    @foreach ($outlet as $out)
                                        <option value="{{ $out->id_outlet }}">{{ $out->nama }} ({{ $out->alamat }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="member"> Nama Member</label>
                                <select name="member" id="member" class="form-control">
                                    <option value="">.:: Pilih Member::.</option>
                                    @foreach ($member as $mem)
                                        <option value="{{ $mem->id_member }}">{{ $mem->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="paket"> Nama Paket</label>
                                <select name="paket" id="paket" class="form-control">
                                    <option value="">.:: Pilih Paket::.</option>
                                    @foreach ($paket as $pak)
                                        <option value="{{ $pak->id_paket }}">{{ $pak->nama_paket }} ({{ $pak->deskripsi }}) Rp. {{ $pak->harga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat <span class="text-danger">(Satuan Kilogram)</span></label>
                                <div class="input-group">
                                    <input type="number" value="0" name="berat" class="form-control">
                                    <span class="input-group-addon">KG</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="biaya_tambahan">Biaya Tambahan</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="number" value="0" name="biaya_tambahan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diskon">diskon <span class="text-danger">(%)</span></label>
                                <div class="input-group">
                                    <input type="number" value="0" name="diskon" class="form-control">
                                    <span class="input-group-addon"><span class="text-danger">(%)</span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pajak">Pajak</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="number" value="0" name="pajak" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tgl" id="tgl" value="{{ date('Y-m-d') }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('transaksi') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
