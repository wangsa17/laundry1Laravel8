<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Admin</b>Laundry</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('template-admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
              <span class="hidden-xs">{{ Auth::user()->nama }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: 120px;">
                <img src="{{ asset('template-admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                {{-- <p>
                    {{ Auth::user()->nama }}
                  <small>{{ Auth::user()->username }}</small>
                </p> --}}
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="col-xs-12 text-center">
                    Nama: {{ Auth::user()->nama }}
                </div>
                <div class="col-xs-12 text-center">
                    Username: {{ Auth::user()->username }}
                </div>
                <div class="col-xs-12 text-center">
                    Role: {{ Auth::user()->role }}
                </div>
            </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                {{-- <div class="pull-left" style="margin-top: 7px">
                     Role: {{ Auth::user()->role }}
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-danger logout">Logout</a>
                </div> --}}
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
