    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('template-user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template-user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template-user/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('template-user/js/counter.js') }}"></script>
    <script src="{{ asset('template-user/js/countdown.js') }}"></script>
    <script src="{{ asset('template-user/js/init.js') }}"></script>
    <script src="{{ asset('template-user/js/modernizr.js') }}"></script>
    <script src="{{ asset('template-user/js/animated-headline.js') }}"></script>
    {{-- <script src="{{ asset('template-user/js/custom.js') }}"></script> --}}
    {{-- Sweetalert --}}
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.logout').click(function() {
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
                        window.location = "{{ route('logoutMember') }}"
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
