<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>
        E-very
    </title>
    <meta name="description" content="Page Title">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    @include('panel.include.style')
    @vite('resources/css/app.css')
    @yield('css')
    <!-- You can add your own stylesheet here to override any styles that comes before it
  <link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
</head>

<body class="mod-bg-1 nav-function-fixed">
    <!-- DOC: script to save and load page settings -->
    <script>
        /**
         *	This script should be placed right after the body tag for fast execution 
         *	Note: the script is written in pure javascript and does not depend on thirdparty library
         **/
        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /** 
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /** 
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        } else {
            console.log("%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...",
                "color: #ed1c24");
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme')) {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);

        } else if (themeSettings.themeURL && document.getElementById('mytheme')) {
            document.getElementById('mytheme').href = themeSettings.themeURL;
        }
        /** 
         * Save to localstorage 
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item) {
                return /^(nav|header|footer|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme')) {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
        }
        /** 
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        }
    </script>
    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            <aside class="page-sidebar bg-every">
                <div class="page-logo bg-every">
                    <a href="panel"
                        class="page-logo-link press-scale-down d-flex align-items-center position-relative">
                        <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">Firma Adı Gelecek</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>
                <!-- BEGIN PRIMARY NAVIGATION -->
                <nav id="js-primary-nav" class="primary-nav" role="navigation">
                    <ul id="js-nav-menu" class="nav-menu">
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="#" title="Category" data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Başlangıç</span>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="#" title="Category" data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Yeni Sipariş</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('eticaretpaketleri') }}" title="Eticaret Paketleri"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">E-ticaret
                                                Paketleri</span>
                                        </a>
                                        <a href="{{ route('pazaryeripaketleri') }}" title="Pazaryeri Paketleri"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Pazaryeri
                                                Paketleri</span>
                                        </a>
                                        <a href="{{ route('sizeozelcozumler') }}" title="Size Özel Çözümler"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Size Özel
                                                Çözümler</span>
                                        </a>
                                        <a href="{{ route('moduller') }}" title="Modüller"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text"
                                                data-i18n="nav.utilities_menu_child">Modüller</span>
                                        </a>
                                        <a href="javascript:void(0);" title="Menu child"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">E-fatura
                                                Kontörü</span>
                                        </a>
                                        <a href="javascript:void(0);" title="Menu child"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Alan Adı (
                                                Domain )</span>
                                        </a>
                                        <a href="javascript:void(0);" title="Menu child"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Sms
                                                Kontörü</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="{{ route('sanalpos') }}" title="Blank Project" data-filter-tags="blank page">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Sanal Pos Başvurusu</span>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="blank.html" title="Blank Project" data-filter-tags="blank page">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Destek Sistemi</span>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="blank.html" title="Blank Project" data-filter-tags="blank page">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Ürün ve Hizmetlerim</span>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="{{ route('domainlerim') }}" title="Alan Adlarım">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Alan Adlarım</span>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('admin'))
                            <li>
                                <a href="#" title="Category" data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">E-very</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('eticaretpaketlerim') }}" title="E-ticaret Paketlerim"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                E-Ticaret Paketleri
                                            </span>
                                        </a>
                                        <a href="{{ route('ilavemodullerim') }}" title="İlave Modullerim"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                İlave Modüller
                                            </span>
                                        </a>
                                        <a href="{{ route('pazaryeripaketlerim') }}" title="Pazaryeri Paketlerim"
                                            data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Pazaryeri Paketleri
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li>
                            <a href="#" title="Category" data-filter-tags="category">
                                <i class="fal fa-file"></i>
                                <span class="nav-link-text" data-i18n="nav.category">Hesap Bilgilerim</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Genel
                                            Bilgiler</span>
                                    </a>
                                    <a href="javascript:void(0);" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text"
                                            data-i18n="nav.utilities_menu_child">Tercihler</span>
                                    </a>
                                    <a href="javascript:void(0);" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Şifre
                                            Değiştir</span>
                                    </a>
                                    <a href="javascript:void(0);" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Kişisel
                                            Veriler</span>
                                    </a>
                                    <a href="javascript:void(0);" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text"
                                            data-i18n="nav.utilities_menu_child">Faturalarım</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if ($user->hasRole('admin'))
                            <li>
                                <a href="{{ route('panel.iletisim') }}" title="Alan Adlarım">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text">İletişim</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('musteriler') }}" title="Müşteriler">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text">Müşteriler</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kodEkle') }}" title="Kod Ekle">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text">Kod Ekle</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Category" data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">İçerikler</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" title="Blog" data-filter-tags="Blog">
                                            <i class="fal fa-file"></i>
                                            <span class="nav-link-text" data-i18n="nav.blog">Blog</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/blogKategoriEkle" title="Blog" data-filter-tags="Blog">
                                                    <i class="fal fa-file"></i>
                                                    <span class="nav-link-text" data-i18n="nav.blog">Blog
                                                        Kategorisi Ekle</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/blogEkle" title="Blog" data-filter-tags="Blog">
                                                    <i class="fal fa-file"></i>
                                                    <span class="nav-link-text" data-i18n="nav.blog">Blog
                                                        Ekle</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/bloglar" title="Blog" data-filter-tags="Blog">
                                                    <i class="fal fa-file"></i>
                                                    <span class="nav-link-text" data-i18n="nav.blog">Blog
                                                        Listesi</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="blank.html" title="Blank Project" data-filter-tags="blank page">
                                            <i class="fal fa-globe"></i>
                                            <span class="nav-link-text" data-i18n="nav.blankpage">Mobil Menü</span>
                                        </a>
                                        <a href="blank.html" title="Blank Project" data-filter-tags="blank page">
                                            <i class="fal fa-globe"></i>
                                            <span class="nav-link-text" data-i18n="nav.blankpage">İletişim
                                                Talepleri</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if ($user->hasRole('user'))
                            <li>
                                <a href="blank.html" title="Blank Project" data-filter-tags="blank page">
                                    <i class="fal fa-comment"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Bize Ulaşın</span>
                                </a>
                            </li>
                        @endif

                    </ul>
                    <div class="filter-message js-filter-message bg-success-600"></div>
                </nav>
                <!-- END PRIMARY NAVIGATION -->
                <!-- NAV FOOTER -->
                <div class="nav-footer shadow-top bg-every">
                    <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify"
                        class="hidden-md-down">
                        <i class="ni ni-chevron-right"></i>
                        <i class="ni ni-chevron-right"></i>
                    </a>
                    <ul class="list-table m-auto nav-footer-buttons">
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Chat logs">
                                <i class="fal fa-comments"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Support Chat">
                                <i class="fal fa-life-ring"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Make a call">
                                <i class="fal fa-phone"></i>
                            </a>
                        </li>
                    </ul>
                </div> <!-- END NAV FOOTER -->
            </aside>
            <!-- END Left Aside -->
            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <header class="page-header" role="banner">
                    <!-- we need this logo when user switches to nav-function-top -->
                    <div class="page-logo">
                        <a href="#"
                            class="page-logo-link press-scale-down d-flex align-items-center position-relative"
                            data-toggle="modal" data-target="#modal-shortcut">
                            <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                            <span
                                class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- DOC: nav menu layout change shortcut -->
                    <div class="hidden-md-down dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn bg-every btn js-waves-off" data-action="toggle"
                            data-class="nav-function-hidden" title="Hide Navigation">
                            <i class="ni ni-menu"></i>
                        </a>
                        Hoşgeldiniz Sayın {{ Auth::user()->name }}
                        <a>
                        </a>
                        <ul>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle"
                                    data-class="nav-function-minify" title="Minify Navigation">
                                    <i class="ni ni-minify-nav"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle"
                                    data-class="nav-function-fixed" title="Lock Navigation">
                                    <i class="ni ni-lock-nav"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- DOC: mobile button appears during mobile width -->
                    <div class="hidden-lg-up">
                        <a href="#" class="header-btn bg-every btn press-scale-down" data-action="toggle"
                            data-class="mobile-nav-on">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>
                    <div class="ml-auto d-flex">
                        <!-- activate app search icon (mobile) -->
                        <div class="hidden-sm-up">
                            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on"
                                data-focus="search-field" title="Search">
                                <i class="fal fa-search"></i>
                            </a>
                        </div>
                        <!-- app settings -->
                        <div class="hidden-md-down">
                            <a href="#" class="header-icon" data-toggle="modal"
                                data-target=".js-modal-settings">
                                <i class="fal fa-cog"></i>
                            </a>
                        </div>
                        <!-- app user menu -->
                        <div>
                            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com"
                                class="header-icon d-flex align-items-center justify-content-center ml-2">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                        <div class="info-card-text">
                                            <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}
                                            </div>
                                            <span
                                                class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item" data-action="app-reset">
                                    <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                                </a>
                                <a href="#" class="dropdown-item" data-toggle="modal"
                                    data-target=".js-modal-settings">
                                    <span data-i18n="drpdwn.settings">Settings</span>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                    <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                    <i class="float-right text-muted fw-n">F11</i>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <span data-i18n="drpdwn.fullscreen">Profilim</span>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item">
                                    <span data-i18n="drpdwn.fullscreen">Çıkış Yap</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </header>
                <!-- END Page Header -->
                <!-- BEGIN Page Content -->
                <!-- the #js-page-content id is needed for some plugins to initialize -->
                <main id="js-page-content" role="main" class="page-content">

                    @yield('content')

                </main>
                <!-- this overlay is activated only when mobile menu is triggered -->
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                <!-- END Page Content -->
                <!-- BEGIN Page Footer -->
                <footer class="page-footer" role="contentinfo">
                    <div class="d-flex align-items-center flex-1 text-muted">
                        <span class="hidden-md-down fw-700">{{ date('Y') }} © E-very by&nbsp;</span>
                    </div>
                </footer>
                <!-- END Page Footer -->
                <!-- BEGIN Shortcuts -->
                <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog"
                    aria-labelledby="modal-shortcut" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <ul class="app-list w-auto h-auto p-0 text-left">
                                    <li>
                                        <a href="intel_introduction.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i
                                                    class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                                <i
                                                    class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Home
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_inbox_general.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i
                                                    class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                                <i
                                                    class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                                <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Inbox
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="intel_introduction.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i
                                                    class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Add More
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Shortcuts -->
                <!-- BEGIN Color profile -->
                <!-- this area is hidden and will not be seen on screens or screen readers -->
                <!-- we use this only for CSS color refernce for JS stuff -->
                <p id="js-color-profile" class="d-none">
                    <span class="color-primary-50"></span>
                    <span class="color-primary-100"></span>
                    <span class="color-primary-200"></span>
                    <span class="color-primary-300"></span>
                    <span class="color-primary-400"></span>
                    <span class="color-primary-500"></span>
                    <span class="color-primary-600"></span>
                    <span class="color-primary-700"></span>
                    <span class="color-primary-800"></span>
                    <span class="color-primary-900"></span>
                    <span class="color-info-50"></span>
                    <span class="color-info-100"></span>
                    <span class="color-info-200"></span>
                    <span class="color-info-300"></span>
                    <span class="color-info-400"></span>
                    <span class="color-info-500"></span>
                    <span class="color-info-600"></span>
                    <span class="color-info-700"></span>
                    <span class="color-info-800"></span>
                    <span class="color-info-900"></span>
                    <span class="color-danger-50"></span>
                    <span class="color-danger-100"></span>
                    <span class="color-danger-200"></span>
                    <span class="color-danger-300"></span>
                    <span class="color-danger-400"></span>
                    <span class="color-danger-500"></span>
                    <span class="color-danger-600"></span>
                    <span class="color-danger-700"></span>
                    <span class="color-danger-800"></span>
                    <span class="color-danger-900"></span>
                    <span class="color-warning-50"></span>
                    <span class="color-warning-100"></span>
                    <span class="color-warning-200"></span>
                    <span class="color-warning-300"></span>
                    <span class="color-warning-400"></span>
                    <span class="color-warning-500"></span>
                    <span class="color-warning-600"></span>
                    <span class="color-warning-700"></span>
                    <span class="color-warning-800"></span>
                    <span class="color-warning-900"></span>
                    <span class="color-success-50"></span>
                    <span class="color-success-100"></span>
                    <span class="color-success-200"></span>
                    <span class="color-success-300"></span>
                    <span class="color-success-400"></span>
                    <span class="color-success-500"></span>
                    <span class="color-success-600"></span>
                    <span class="color-success-700"></span>
                    <span class="color-success-800"></span>
                    <span class="color-success-900"></span>
                    <span class="color-fusion-50"></span>
                    <span class="color-fusion-100"></span>
                    <span class="color-fusion-200"></span>
                    <span class="color-fusion-300"></span>
                    <span class="color-fusion-400"></span>
                    <span class="color-fusion-500"></span>
                    <span class="color-fusion-600"></span>
                    <span class="color-fusion-700"></span>
                    <span class="color-fusion-800"></span>
                    <span class="color-fusion-900"></span>
                </p>
                <!-- END Color profile -->
            </div>
        </div>
    </div>
    <!-- END Page Wrapper -->
    <!-- BEGIN Quick Menu -->
    <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
    <nav class="shortcut-menu d-none d-sm-block">
        <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
        <label for="menu_open" class="menu-open-button ">
            <span class="app-shortcut-icon d-block"></span>
        </label>
        <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
            <i class="fal fa-arrow-up"></i>
        </a>
        <a href="page_login.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
            <i class="fal fa-sign-out"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip"
            data-placement="left" title="Full Screen">
            <i class="fal fa-expand"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left"
            title="Print page">
            <i class="fal fa-print"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left"
            title="Voice command">
            <i class="fal fa-microphone"></i>
        </a>
    </nav>
    <!-- END Quick Menu -->
    <!-- BEGIN Messenger -->

    <!-- END Messenger -->
    <!-- BEGIN Page Settings -->
    <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-md">
            <div class="modal-content">
                <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                    <h4 class="m-0 text-center color-white">
                        Layout Settings
                        <small class="mb-0 opacity-80">User Interface Settings</small>
                    </h4>
                    <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="settings-panel">
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    App Layout
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="fh">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="header-function-fixed"></a>
                            <span class="onoffswitch-title">Fixed Header</span>
                            <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                        </div>
                        <div class="list" id="nff">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-function-fixed"></a>
                            <span class="onoffswitch-title">Fixed Navigation</span>
                            <span class="onoffswitch-title-desc">left panel is fixed</span>
                        </div>
                        <div class="list" id="nfm">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-function-minify"></a>
                            <span class="onoffswitch-title">Minify Navigation</span>
                            <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                        </div>
                        <div class="list" id="nfh">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-function-hidden"></a>
                            <span class="onoffswitch-title">Hide Navigation</span>
                            <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                        </div>
                        <div class="list" id="nft">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-function-top"></a>
                            <span class="onoffswitch-title">Top Navigation</span>
                            <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                        </div>
                        <div class="list" id="fff">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="footer-function-fixed"></a>
                            <span class="onoffswitch-title">Fixed Footer</span>
                            <span class="onoffswitch-title-desc">page footer is fixed</span>
                        </div>
                        <div class="list" id="mmb">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-main-boxed"></a>
                            <span class="onoffswitch-title">Boxed Layout</span>
                            <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                        </div>
                        <div class="expanded">
                            <ul class="mb-3 mt-1">
                                <li>
                                    <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                </li>
                                <li>
                                    <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                </li>
                                <li>
                                    <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                </li>
                                <li>
                                    <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                </li>
                                <li>
                                    <div class="bg-white border" data-action="toggle" data-class="mod-bg-none"></div>
                                </li>
                            </ul>
                            <div class="list" id="mbgf">
                                <a href="#" onclick="return false;" class="btn btn-switch"
                                    data-action="toggle" data-class="mod-fixed-bg"></a>
                                <span class="onoffswitch-title">Fixed Background</span>
                            </div>
                        </div>
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Mobile Menu
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="nmp">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-mobile-push"></a>
                            <span class="onoffswitch-title">Push Content</span>
                            <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                        </div>
                        <div class="list" id="nmno">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-mobile-no-overlay"></a>
                            <span class="onoffswitch-title">No Overlay</span>
                            <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                        </div>
                        <div class="list" id="sldo">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-mobile-slide-out"></a>
                            <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                            <span class="onoffswitch-title-desc">Content overlaps menu</span>
                        </div>
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Accessibility
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="mbf">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-bigger-font"></a>
                            <span class="onoffswitch-title">Bigger Content Font</span>
                            <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                        </div>
                        <div class="list" id="mhc">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-high-contrast"></a>
                            <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                            <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                        </div>
                        <div class="list" id="mcb">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-color-blind"></a>
                            <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                            <span class="onoffswitch-title-desc">color vision deficiency</span>
                        </div>
                        <div class="list" id="mpc">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-pace-custom"></a>
                            <span class="onoffswitch-title">Preloader Inside</span>
                            <span class="onoffswitch-title-desc">preloader will be inside content</span>
                        </div>
                        <div class="list" id="mpi">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-panel-icon"></a>
                            <span class="onoffswitch-title">SmartPanel Icons (not Panels)</span>
                            <span class="onoffswitch-title-desc">smartpanel buttons will appear as icons</span>
                        </div>
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Global Modifications
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="mcbg">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-clean-page-bg"></a>
                            <span class="onoffswitch-title">Clean Page Background</span>
                            <span class="onoffswitch-title-desc">adds more whitespace</span>
                        </div>
                        <div class="list" id="mhni">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-hide-nav-icons"></a>
                            <span class="onoffswitch-title">Hide Navigation Icons</span>
                            <span class="onoffswitch-title-desc">invisible navigation icons</span>
                        </div>
                        <div class="list" id="dan">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-disable-animation"></a>
                            <span class="onoffswitch-title">Disable CSS Animation</span>
                            <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                        </div>
                        <div class="list" id="mhic">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-hide-info-card"></a>
                            <span class="onoffswitch-title">Hide Info Card</span>
                            <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                        </div>
                        <div class="list" id="mlph">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-lean-subheader"></a>
                            <span class="onoffswitch-title">Lean Subheader</span>
                            <span class="onoffswitch-title-desc">distinguished page header</span>
                        </div>
                        <div class="list" id="mnl">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-nav-link"></a>
                            <span class="onoffswitch-title">Hierarchical Navigation</span>
                            <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                        </div>
                        <div class="list" id="mdn">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-nav-dark"></a>
                            <span class="onoffswitch-title">Dark Navigation</span>
                            <span class="onoffswitch-title-desc">Navigation background is darkend</span>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="mt-4 d-table w-100 pl-5 pr-3">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Global Font Size
                                </h5>
                            </div>
                        </div>
                        <div class="list mt-1">
                            <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-sm" data-target="html">
                                    <input type="radio" name="changeFrontSize"> SM
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text" data-target="html">
                                    <input type="radio" name="changeFrontSize" checked=""> MD
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-lg" data-target="html">
                                    <input type="radio" name="changeFrontSize"> LG
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-xl" data-target="html">
                                    <input type="radio" name="changeFrontSize"> XL
                                </label>
                            </div>
                            <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to
                                effect rem
                                values (resets on page refresh)</span>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="mt-4 d-table w-100 pl-5 pr-3">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0 pr-2 d-flex">
                                    Theme colors
                                    <a href="#" class="ml-auto fw-400 fs-xs" data-toggle="popover"
                                        data-trigger="focus" data-placement="top" title="" data-html="true"
                                        data-content="The settings below uses <code>localStorage</code> to load the external <strong>CSS</strong> file as an overlap to the base css. Due to network latency and <strong>CPU utilization</strong>, you may experience a brief flickering effect on page load which may show the intial applied theme for a split second. Setting the prefered style/theme in the header will prevent this from happening."
                                        data-original-title="<span class='text-primary'><i class='fal fa-exclamation-triangle mr-1'></i> Heads up!</span>"
                                        data-template="<div class=&quot;popover bg-white border-white&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><h3 class=&quot;popover-header bg-transparent&quot;></h3><div class=&quot;popover-body fs-xs&quot;></div></div>"><i
                                            class="fal fa-info-circle mr-1"></i> more info</a>
                                </h5>
                            </div>
                        </div>
                        <div class="expanded theme-colors pl-5 pr-3">
                            <ul class="m-0">
                                <li>
                                    <a href="#" id="myapp-0" data-action="theme-update" data-themesave
                                        data-theme="" data-toggle="tooltip" data-placement="top"
                                        title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-1" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-1.css" data-toggle="tooltip"
                                        data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-2" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-2.css" data-toggle="tooltip"
                                        data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-3" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-3.css" data-toggle="tooltip"
                                        data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-4" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-4.css" data-toggle="tooltip"
                                        data-placement="top" title="Dodger Blue"
                                        data-original-title="Dodger Blue"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-5" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-5.css" data-toggle="tooltip"
                                        data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-6" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-6.css" data-toggle="tooltip"
                                        data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-7" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-7.css" data-toggle="tooltip"
                                        data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-8" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-8.css" data-toggle="tooltip"
                                        data-placement="top" title="Chetwode Blue"
                                        data-original-title="Chetwode Blue"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-9" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-9.css" data-toggle="tooltip"
                                        data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-10" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-10.css" data-toggle="tooltip"
                                        data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-11" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-11.css" data-toggle="tooltip"
                                        data-placement="top" title="Green Smoke"
                                        data-original-title="Green Smoke"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-12" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-12.css" data-toggle="tooltip"
                                        data-placement="top" title="Wild Blue Yonder"
                                        data-original-title="Wild Blue Yonder"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-13" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-13.css" data-toggle="tooltip"
                                        data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-14" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-14.css" data-toggle="tooltip"
                                        data-placement="top" title="Supernova" data-original-title="Supernova"></a>
                                </li>
                                <li>
                                    <a href="#" id="myapp-15" data-action="theme-update" data-themesave
                                        data-theme="css/themes/cust-theme-15.css" data-toggle="tooltip"
                                        data-placement="top" title="Hoki" data-original-title="Hoki"></a>
                                </li>
                            </ul>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="mt-4 d-table w-100 pl-5 pr-3">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0 pr-2 d-flex">
                                    Theme Modes (beta)
                                    <a href="#" class="ml-auto fw-400 fs-xs" data-toggle="popover"
                                        data-trigger="focus" data-placement="top" title="" data-html="true"
                                        data-content="This is a brand new technique we are introducing which uses CSS variables to infiltrate color options. While this has been working nicely on modern browsers without much issues, some users <strong>may still face issues on Internet Explorer </strong>. Until these issues are resolved or Internet Explorer improves, this feature will remain in Beta"
                                        data-original-title="<span class='text-primary'><i class='fal fa-question-circle mr-1'></i> Why beta?</span>"
                                        data-template="<div class=&quot;popover bg-white border-white&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><h3 class=&quot;popover-header bg-transparent&quot;></h3><div class=&quot;popover-body fs-xs&quot;></div></div>"><i
                                            class="fal fa-question-circle mr-1"></i> why beta?</a>
                                </h5>
                            </div>
                        </div>
                        <div class="pl-5 pr-3 py-3">
                            <div class="ie-only alert alert-warning d-none">
                                <h6>Internet Explorer Issue</h6>
                                This particular component may not work as expected in Internet Explorer. Please use with
                                caution.
                            </div>
                            <div class="row no-gutters">
                                <div class="col-4 pr-2 text-center">
                                    <div id="skin-default" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-light mod-skin-dark" data-class=""
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-primary rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Default Mode" style="height: 80px">
                                        <div
                                            class="bg-primary-600 bg-primary-gradient px-2 pt-0 border-right border-primary">
                                        </div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-white border-bottom border-primary py-1"></div>
                                            <div class="bg-faded flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Default
                                </div>
                                <div class="col-4 px-1 text-center">
                                    <div id="skin-light" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-dark" data-class="mod-skin-light"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-secondary rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Light Mode" style="height: 80px">
                                        <div class="bg-white px-2 pt-0 border-right border-"></div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-white border-bottom border- py-1"></div>
                                            <div class="bg-white flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Light
                                </div>
                                <div class="col-4 pl-2 text-center">
                                    <div id="skin-dark" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-light" data-class="mod-skin-dark"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-dark rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Dark Mode" style="height: 80px">
                                        <div class="bg-fusion-500 px-2 pt-0 border-right"></div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-fusion-600 border-bottom py-1"></div>
                                            <div class="bg-fusion-300 flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3 opacity-30"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Dark
                                </div>
                            </div>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="pl-5 pr-3 py-3 bg-faded">
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <a href="#" class="btn btn-outline-danger fw-500 btn-block"
                                        data-action="app-reset">Reset Settings</a>
                                </div>
                                <div class="col-6 pl-1">
                                    <a href="#" class="btn btn-danger fw-500 btn-block"
                                        data-action="factory-reset">Factory Reset</a>
                                </div>
                            </div>
                        </div>
                    </div> <span id="saving"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Settings -->
    <!-- base vendor bundle:
   DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
      + pace.js (recommended)
      + jquery.js (core)
      + jquery-ui-cust.js (core)
      + popper.js (core)
      + bootstrap.js (core)
      + slimscroll.js (extension)
      + app.navigation.js (core)
      + ba-throttle-debounce.js (core)
      + waves.js (extension)
      + smartpanels.js (extension)
      + src/../jquery-snippets.js (core) -->

    @include('panel.include.script')
    <!--This page contains the basic JS and CSS files to get started on your project. If you need aditional addon's or plugins please see scripts located at the bottom of each page in order to find out which JS/CSS files to add.-->
</body>
<!-- END Body -->

</html>
