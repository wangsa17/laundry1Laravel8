@extends('admin.layout.app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $judul }}
                </h1>
                <ol class="breadcrumb">
                  {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">{{ $menu }}</li> --}}
                </ol>
              </section>

              <!-- Main content -->
              <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>{{ $paket->count('id_paket') }}</h3>
                            <p>Banyak Paket yang Tersedia</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          @if (Auth::user()->role == 'Admin')
                          <a href="{{ route('paket') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                          @else
                          <a href="#" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                          @endif
                        </div>
                      </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>{{ $member->count('id_member') }}</h3>
                            <p>Akun Member Terdaftar</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          @if (Auth::user()->role == 'Admin')
                          <a href="{{ route('member') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                          @elseif (Auth::user()->role == 'Kasir')
                          <a href="{{ route('member') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                          @else
                          <a href="#" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                          @endif
                        </div>
                      </div><!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>{{ $outlet->count('id_outlet') }}</h3>
                        <p>Banyak outlet</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph  "></i>
                      </div>
                      @if (Auth::user()->role == 'Admin')
                      <a href="{{ route('outlet') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                      @else
                      <a href="#" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                      @endif
                    </div>
                  </div><!-- ./col -->

                  <div class="col-lg-12 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{ $transaksi->count('id_transaksi') }}</h3>
                        <p>Banyak Transaksi</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      @if (Auth::user()->role == 'Admin')
                      <a href="{{ route('transaksi') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                      @elseif (Auth::user()->role == 'Kasir')
                      <a href="{{ route('transaksi') }}" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                      @else
                      <a href="#" class="small-box-footer">Lihat Lainnya <i class="fa fa-arrow-circle-right"></i></a>
                      @endif
                    </div>
                  </div><!-- ./col -->
                </div><!-- /.row -->
                <!-- Main row -->

              </section><!-- /.content -->
@endsection
