@php($lihat_konfigurasi_aplikasis = \App\Models\Master_konfigurasi_aplikasi::first())
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{$lihat_konfigurasi_aplikasis->deskripsi_konfigurasi_aplikasis}}">
    <meta name="author" content="Administratori {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
    <meta name="keyword" content="{{$lihat_konfigurasi_aplikasis->keyword_konfigurasi_aplikasis}}">
    <title>Dashboard {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link href="{{URL::asset('template/back/css/style.css')}}" rel="stylesheet">
    <style>
        .right-align{
            text-align:right;
        }
        <style>
            .c-app{
                background-color: #f3f6f9 !important;
            }
            .bg-custom{
                background: url('{{URL::asset("template/back/assets/img/login.jpg")}}');
                background-repeat: no-repeat;
                background-size: auto;
            }
            .titlelogin{
                margin-bottom: 20px;
            }
            .card {
                box-shadow: 0px 4px 8px 1px rgb(176 176 176 / 35%) !important;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            .registerhere{
                margin-top: 20px;
                text-align:center;
            }
            .btn-login{
                background-color:#00764b;
                color:white;
                font-size:16px;
                font-weight:bold;
            }
            .errorform{
                color:red;
            }
            .btn:hover{
                color: #fff;
                background-color: #0069d9;
                border-color: #0062cc;
            }
            .logopds{
                margin-left:-20px;
                margin-bottom: 50px;
                text-align:center;
            }

        </style>

    </style>
  </head>
  <body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-group">
                    <div class="card col-lg-5 col-sm-12 col-md-12">
                        <div class="card-body">
                            <div class="logopds">
                                <img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}">
                            </div>
                            {{$slot}}
                        </div>
                    </div>
                    <div class="card col-lg-8 col-sm-12 col-md-12 bg-custom d-md-down-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('template/back/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js')}}"></script>
    <script src="{{URL::asset('template/back/vendors/@coreui/icons/js/svgxuse.min.js')}}"></script>
  </body>
</html>