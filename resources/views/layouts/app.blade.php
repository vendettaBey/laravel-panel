<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/select2/select2.bundle.css') }}">
    <!-- sayfa düzenle alanında dahil edilenler-->
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/fa-brands.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/notifications/toastr/toastr.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/theme-demo.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('adminassets/css/style.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/notifications/sweetalert2/sweetalert2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('adminassets/css/formplugins/dropzone/dropzone.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->


        <!-- Page Content -->
        <main>

        </main>
    </div>
</body>

</html>
