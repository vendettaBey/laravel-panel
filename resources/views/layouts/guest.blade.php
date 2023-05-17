<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta name="description" content="@yield('siteAciklama')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="msapplication-tap-highlight" content="no">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/vendors.bundle.css') }}">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/app.bundle.css') }}">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/skins/skin-master.css') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('adminassets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('adminassets/img/favicon/favicon-32x32.png') }}">
    <link rel="mask-icon" href="{{ asset('adminassets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/fa-brands.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/css/login.css') }}">
    <!-- sayfa düzenle alanında dahil edilenler-->
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/fa-brands.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/notifications/toastr/toastr.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/theme-demo.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/dropzone/dropzone.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-brand-custom">
    <div style="background: url({{ asset('adminassets/img/svg/pattern-1.svg') }}) no-repeat center bottom fixed; z-index:999; background-size: cover; z-index: 2"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-600">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current" />
            </a>
        </div>

        <div class="w-full bg-brand-custom sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('adminassets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/js/app.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/js/notifications/sweetalert2/sweetalert2.bundle.js') }}"></script>
</body>

</html>
