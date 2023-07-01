<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex align-items-center mb-4 pb-2">
                <div>
                    <img src="{{ asset('template-user/images/bubbles.png') }}" class="logo img-fluid" alt="">
                </div>

                <ul class="footer-menu d-flex flex-wrap ms-5">
                    <li class="footer-menu-item"><a href="{{ route('home') }}" class="footer-menu-link">Home</a></li>

                    <li class="footer-menu-item"><a href="{{ route('paketUser') }}" class="footer-menu-link">Paket</a></li>

                    <li class="footer-menu-item"><a href="{{ route('outletUser') }}" class="footer-menu-link">Outlet</a></li>

                    <li class="footer-menu-item"><a href="{{ route('pesan', Auth::id()) }}" class="footer-menu-link">Pesan</a></li>

                    <li class="footer-menu-item"><a href="{{ route('history', Auth::id()) }}" class="footer-menu-link">Riwayat Pesanan</a></li>
                </ul>
            </div>

            {{-- <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                <h5 class="site-footer-title mb-3">Our Services</h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            House Cleaning
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Car Washing
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Laundry
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Office Cleaning
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Toilet Cleaning
                        </a>
                    </li>
                </ul>
            </div> --}}

            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                <h5 class="site-footer-title mb-3">Kantor</h5>

                <p class="text-white d-flex mt-3 mb-2">
                    <i class="bi-geo-alt-fill me-2"></i>
                    Prajuritkulon, Mojokerto
                </p>

                <p class="text-white d-flex mb-2">
                    <i class="bi-telephone-fill me-2"></i>

                    <a href="tel: 0895635645611" class="site-footer-link">
                        089563564561
                    </a>
                </p>

                <p class="text-white d-flex">
                    <i class="bi-envelope-fill me-2"></i>

                    <a href="mailto:admin@gmail.com" class="site-footer-link">
                        admin@gmail.com
                    </a>
                </p>

                <ul class="social-icon mt-4">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-twitter"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-facebook"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-instagram"></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-6 mt-3 mt-lg-0 mt-md-0">
                <div class="featured-block">
                    <h5 class="text-white mb-3">Jam Buka</h5>

                    <strong class="d-block text-white mb-1">Sabtu - Kamis</strong>

                    <p class="text-white mb-3">8:00 AM - 5:30 PM</p>

                    <strong class="d-block text-white mb-1">Sat</strong>

                    <p class="text-white mb-0">7s:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <p class="copyright-text mb-0">Copyright © 2023 Aplikasi Pengelolaan Laundry.</p>
                </div>

                <div class="col-lg-6 col-12 text-end">
                    <p class="copyright-text mb-0">
                        // Designed by Wangsa //</p>
                </div>

            </div>
        </div>
    </div>
</footer>
