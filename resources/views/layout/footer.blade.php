<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">

            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://adhyy.my.id/" target="_blank">Andi Ayu</a>
                    2022</p>
            </div>
        </div>
        <!--**********************************
                    Footer end
                ***********************************-->




        </div>
        <!--**********************************
                Main wrapper end
            ***********************************-->

        <!--**********************************
                Scripts
            ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset('dashboard/xhtml') }}/vendor/global/global.min.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/vendor/owl-carousel/owl.carousel.js"></script>
        <!-- Apex Chart -->
        <script src="{{ asset('dashboard/xhtml') }}/vendor/apexchart/apexchart.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/vendor/nouislider/nouislider.min.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/vendor/wnumb/wNumb.js"></script>

        <!-- Dashboard 1 -->
        <script src="{{ asset('dashboard/xhtml') }}/js/dashboard/dashboard-1.js"></script>

        <script src="{{ asset('dashboard/xhtml') }}/js/custom.min.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/js/dlabnav-init.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/js/demo.js"></script>
        <script src="{{ asset('dashboard/xhtml') }}/js/styleSwitcher.js"></script>
        <script>
            function cardsCenter()
            {

                /*  testimonial one function by = owl.carousel.js */



                jQuery('.card-slider').owlCarousel({
                    loop:true,
                    margin:0,
                    nav:true,
                    center:true,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    slideSpeed: 3000,
                    paginationSpeed: 3000,
                    dots: false,
                    navText: ['', ''],
                    responsive:{
                        0:{
                            items:1
                        },
                        576:{
                            items:1
                        },
                        800:{
                            items:2
                        },
                        991:{
                            items:2
                        },
                        1200:{
                            items:2
                        },
                        1600:{
                            items:3
                        }
                    }
                })
            }

            jQuery(window).on('load',function(){
                setTimeout(function(){
                    cardsCenter();
                }, 1000);
            });

        </script>

        </body>

        </html>
