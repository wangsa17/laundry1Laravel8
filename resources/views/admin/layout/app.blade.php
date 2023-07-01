<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLaundry | {{ $judul }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('admin.layout.css')
  </head>
  <body class="skin-blue">
    <div class="wrapper">

    @include('admin.layout.header')
      <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layout.sidebar')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->
      @include('admin.layout.footer')
    </div><!-- ./wrapper -->
    @include('sweetalert::alert')
    @include('admin.layout.js')
    @yield('script')

  </body>
</html>
