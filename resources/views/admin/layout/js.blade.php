<!-- jQuery 2.1.3 -->
<script src="{{ asset('template-admin/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('template-admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('template-admin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{ asset('template-admin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{ asset('template-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('template-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript">
</script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template-admin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{ asset('template-admin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{ asset('template-admin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('template-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"
    type="text/javascript"></script>
<!-- iCheck -->
<script src="{{ asset('template-admin/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{{ asset('template-admin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src='{{ asset('template-admin/plugins/fastclick/fastclick.min.js') }}'></script>
<!-- AdminLTE App -->
<script src="{{ asset('template-admin/dist/js/app.min.js')}}" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template-admin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template-admin/dist/js/demo.js')}}" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="{{ asset('template-admin/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('template-admin/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>

<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>

<script>
    $('.logout').click(function () {
        //   var kpid = $(this).attr('data-id');
        //   var kpnama = $(this).attr('data-nama');
        swal({
                title: "Yakin Ingin Logout?",
                text: "Kamu akan logout",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "{{ route('logout') }}"
                    // window.location = "/logout"
                    swal("Berhasil Logout", {
                        icon: "success",
                    });
                } else {
                    swal("Tidak Jadi Logout");
                }
            });
    });

</script>
