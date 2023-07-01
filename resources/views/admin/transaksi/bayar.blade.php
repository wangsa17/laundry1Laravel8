@extends('admin.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Pembayaran {{ $judul }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pembayaran {{ $judul }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('transaksiBayarStore') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id_transaksi" class="form-control" value="{{ old('id_transaksi')?old('id_transaksi'):$transaksi->id_transaksi }}">
                            </div>
                            <div class="form-group">
                                <label for="kode_transaksi">Kode Transaksi</label>
                                <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi"
                                    value="{{ old('kode_transaksi')? old('kode_transaksi'):$transaksi->kode_transaksi}}" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="member">Member</label>
                                <select name="member" id="member" class="form-control" required disabled>
                                    <option value="">.:: Pilih Member::.</option>
                                    @foreach ($member as $mem)
                                        <option value="{{ $mem->id_member }}" {{ $mem->id_member == $transaksi->member_id ? 'selected': ''}}>{{ $mem->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @foreach ($transaksi->transaksiDetail as $td)
                                    @php
                                        // $diskon = (($td->paket->harga + $td->) * $transaksi->diskon/100);
                                        $jumlah = $td->qty * $td->paket->harga + $transaksi->biaya_tambahan + $transaksi->pajak;
                                        $getdiskon = ($jumlah * $transaksi->diskon) / 100;
                                        $total = $jumlah - $getdiskon;
                                    @endphp
                                @endforeach
                                <label for="total_harga">Total Harga</label>
                                <input type="text" name="total_harga" class="form-control" id="total_harga"
                                    value="Rp. {{ number_format($total, 0, '.', '.') }}" placeholder="Masukkan Jumlah"
                                    disabled>
                                <input type="hidden" name="total_harga" class="form-control" id="total_harga"
                                    value="{{ $total }}" placeholder="Masukkan Jumlah"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Jumlah Pembayaran</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="number" name="total_bayar" class="form-control" id="total_bayar"
                                    value="{{ old('total_bayar') }}" placeholder="Masukkan Jumlah Pembayaran">
                                </div><!-- /.input group -->

                            </div>
                            {{-- <div class="form-group">
                                <label>No Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="number" class="form-control" name="tlp" id="tlp"
                                        value="{{ old('tlp') }}" placeholder="Masukkan No Telepon">
                                </div><!-- /.input group -->
                            </div> --}}
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
