<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('template-user/images/bubbles.png') }}" class="img-circle"
                    alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->nama }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Role: {{ Auth::user()->role }}</li>
            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}">
                {{-- class="active treeview" --}}
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="
            {{-- {{ $menu == 'kasir' ? 'active' : '' }} | {{ $menu == 'member' ? 'active' : '' }} --}}
            ">
                @if (Auth::user()->role == 'Admin')
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Data User</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('user') }}"><i
                                    class="fa fa-circle-o"></i>Data Kasir</a></li>
                        <li class=""><a href="{{ route('member') }}"><i
                                    class="fa fa-circle-o"></i>Data Member</a></li>
                    </ul>
                @endif
                @if (Auth::user()->role == 'Kasir')
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Data User</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="#"><i
                                    class="fa fa-circle-o"></i>Data Member</a></li>
                    </ul>
                @endif
            </li>
            <li>
                @if (Auth::user()->role == 'Admin')
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $menu == 'outlet' ? 'active' : '' }}"><a href="{{ route('outlet') }}"><i
                                    class="fa fa-circle-o"></i>Data Outlet</a></li>
                        <li><a href="{{ route('paket') }}"><i class="fa fa-circle-o"></i>Data Paket</a></li>
                    </ul>
                @endif
            </li>
            @if (Auth::user()->role == 'Admin' | Auth::user()->role == 'Kasir')
            <li {{ $menu == 'transaksi' ? 'active' : '' }}>
                <a href="{{ route('transaksi') }}">
                    <i class="fa fa-dollar"></i> <span>Transaksi</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('laporan') }}">
                    <i class="fa fa-file"></i> <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
