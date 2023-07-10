@php($lihat_konfigurasi_aplikasis       = \App\Models\Master_konfigurasi_aplikasi::first())
@php($lihat_sosial_medias               = \App\Models\Master_sosial_media::get())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="manifest" href="{{URL::asset('template/front/images/favicons/site.webmanifest')}}" />
    <meta name="description" content="{{$lihat_konfigurasi_aplikasis->deskripsi_konfigurasi_aplikasis}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/govity-icons/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/tiny-slider/tiny-slider.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/reey-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/vegas/vegas.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/timepicker/timePicker.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nice-select/nice-select.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity-responsive.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/custom.css')}}" />
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <div class="page-wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>


    @include('layouts.mobilenav')

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


    <script src="{{URL::asset('template/front/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/odometer/odometer.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/swiper/swiper.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/wow/wow.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/isotope/isotope.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/vegas/vegas.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/timepicker/timePicker.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/circleType/jquery.circleType.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/circleType/jquery.lettering.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/nice-select/jquery.nice-select.min.js')}}"></script>


    <!-- template js -->
    <script src="{{URL::asset('template/front/js/govity.js')}}"></script>
</body>

</html>