<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }} : Sistem Pemesanan Menu Makanan" />
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{ config('app.name') }} | Authentication</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/xhtml') }}/images/favicon.png" />
    <link href="{{ asset('dashboard/xhtml') }}/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#"><img src="{{ asset('dashboard/xhtml') }}/images/logo-full.png"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Masuk menggunakan Qr Code</h4>
                                    @include('auth.notif.index')
                                    <form action="{{ route('login_page.post') }}" method="POST">
                                        @csrf
                                        {{-- <div id="reader" width="600px"></div> --}}
                                        @if(!Sentinel::getUser())
                                        <div class="row">
                                            <div id="reader" width="600px"></div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div id="message" class="text-center">
                                    </div>
                                </div>
                                @else
                                <h1>Hallo! {{Sentinel::getUser()->first_name}}</h1>
                                @endif
                            </div>
                            <div class="col-md-2">
                            </div>
                            </form>
                            {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Daftar</a></p>
                                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript">
        < script src = "{{ asset('dashboard/xhtml') }}/vendor/global/global.min.js" >

    </script>
    <script src="{{ asset('dashboard/xhtml') }}/js/custom.min.js"></script>
    <script src="{{ asset('dashboard/xhtml') }}/js/dlabnav-init.js"></script>
    <script src="{{ asset('dashboard/xhtml') }}/js/jsqrcode-combined.min.js"></script>
    <script src="{{ asset('dashboard/xhtml') }}/js/html5-qrcode.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code matched = ${decodedText}`, decodedResult);
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{ route('login_qrcode.post') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": decodedText,
                        "password": "MejaPassword@@",
                    },
                    success: function (data) {
                        // console.log(data);
                        $(location).attr('href', '{{ route('order.index') }}');

                    }
                })
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        setTimeout( () => {
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
        }, 1000)

    </script>

</body>

</html>
