@php($lihat_konfigurasi_aplikasis       = \App\Models\Master_konfigurasi_aplikasi::first())
@php($lihat_sosial_medias               = \App\Models\Master_sosial_media::get())
<!DOCTYPE html >
<html lang="en" style="max-width:912px; margin:0 auto; text-align:center; border: 1px solid #000">
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
	<link type="text/css" media="screen" rel="stylesheet" href="{{{ URL::asset('template/back/vendors/select2/dist/css/select2.min.css')}}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity-responsive.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/custom.css')}}" />
	<meta name="_token" content="{{ csrf_token() }}">
    <script src="{{URL::asset('template/front/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<link rel="stylesheet" href="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.css')}}" />

    <style>
        .preloader__image {
            animation-fill-mode: both;
            animation-name: flipInY;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            background-image: url('{{"/storage/".$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis}}');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 256px auto;
            width: 100%;
            height: 100%;
        }
	    .select2-container .select2-selection--single{
	    	height: 35px;
	    }
	    .select2-container .select2-selection--single .select2-selection__rendered{
	    	margin-top: 2px;
	    }
	    .select2-container--default .select2-selection--single .select2-selection__arrow b{
	    	margin-top: 2px;
	    }
	    .errorform {
	        color: red;
	    }
	    .errorformfile {
	        padding-top: 10px;
	        color: red;
	    }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            //Select2
                $('.select2').select2({
                    width: '100%',
                });
        });
    </script>
    <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZHS3BWHBKB"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZHS3BWHBKB');
    </script>
    <meta name="facebook-domain-verification" content="eojk5h6x3sm37insfskcsx3j06b1mn" />
    <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1688901651623363');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1688901651623363&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <div class="page-wrapper">
        @include('mobile.layouts.header')
        @yield('content')
        @include('mobile.layouts.footer')
    </div>


    @include('layouts.mobilenav')

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>

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
	<script type="text/javascript" src="{{ URL::asset('template/back/vendors/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.js')}}"></script>


    <!-- template js -->
    <script src="{{URL::asset('template/front/js/govity.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('.getDate').datepicker({
	            dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
	        	dayNamesMin: ['Mi', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
	        	dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
	        	monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
	        	dateFormat: "dd M yy",
	        	changeMonth: true,
	        	changeYear: true,
                yearRange: "-100:+0"
	        });
	    });
    </script>
</body>

</html>