@extends('panel.layout')
@section('css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
@section('content')
    <div class="row  justify-content-center ">
        <div class="col-sm-6 col-xl-2 topnav">
            <a href="genel.html" class="d-block">
                <div class="pt-5 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g ">
                    <div class="">
                        <p class="display-4 d-block l-h-n m-0 fw-500 text-center">15</p>
                        <h5 class="display-4 d-block l-h-n m-0 fw-500 text-center" style="font-size:16px;">
                            Ürün / Hizmet
                        </h5>
                    </div>
                    <i class="fal fa-desktop position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1 zoom"
                        style="font-size:6rem"></i>

                    <p class="mt-5 text-center sticky-p pt-2 pb-1 light">
                        Ürün ve Hizmetlerim <i style="margin-left: 10px" class="fal fa-arrow-right"></i></p>
                </div>


            </a>
        </div>
        <div class="col-sm-6 col-xl-2 topnav">
            <a href="genel.html" class="d-block">
                <div class="pt-5 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g ">
                    <div class="">
                        <p class="display-4 d-block l-h-n m-0 fw-500 text-center">{{ count($domains) }}</p>
                        <h5 class="display-4 d-block l-h-n m-0 fw-500 text-center" style="font-size:16px;">
                            Alan Adı
                        </h5>
                    </div>
                    <i class="fal fa-edit position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1 zoom"
                        style="font-size:6rem"></i>

                    <p class="mt-5 text-center sticky-p pt-2 pb-1 light">
                        Alan Adlarım<i style="margin-left: 10px" class="fal fa-arrow-right"></i></p>
                </div>


            </a>
        </div>
        <div class="col-sm-6 col-xl-2 topnav">
            <a href="genel.html" class="d-block m-0 p-0">
                <div class="pt-5 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g ">
                    <div class="">
                        <p class="display-4 d-block l-h-n m-0 fw-500 text-center">1</p>
                        <h5 class="display-4 d-block l-h-n m-0 fw-500 text-center" style="font-size: 15px;">
                            Ödenmemiş Fatura
                        </h5>
                    </div>
                    <i class="fal fa-receipt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1 zoom"
                        style="font-size:6rem"></i>

                    <p class="mt-5 text-center sticky-p pt-2 pb-1 light">
                        Tüm Faturalarım<i style="margin-left: 10px" class="fal fa-arrow-right"></i></p>
                </div>


            </a>
        </div>
        <div class="col-sm-6 col-xl-2 topnav">
            <a href="genel.html" class="d-block">
                <div class="pt-5 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g ">
                    <div class="">
                        <p class="display-4 d-block l-h-n m-0 fw-500 text-center">1</p>
                        <h5 class="display-4 d-block l-h-n m-0 fw-500 text-center" style="font-size:15px;">
                            Aktif Destek Talebi
                        </h5>
                    </div>
                    <i class="fal fa-life-ring position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1 zoom"
                        style="font-size:6rem"></i>

                    <p class="mt-5 text-center sticky-p pt-2 pb-1 light">
                        Destek Talebi Oluştur<i style="margin-left: 10px" class="fal fa-arrow-right"></i></p>
                </div>


            </a>
        </div>
        <div class="col-sm-12 col-xl-2 topnav">
            <a href="genel.html" class="d-block">
                <div class="pt-5 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g ">
                    <div class="">
                        <p class="display-4 d-block l-h-n m-0 fw-500 text-center">311,92₺</p>
                        <h5 class="display-4 d-block l-h-n m-0 fw-500 text-center" style="font-size:16px;">
                            Hesap Kredisi
                        </h5>
                    </div>
                    <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1 zoom"
                        style="font-size:6rem"></i>

                    <p class="mt-5 text-center sticky-p pt-2 pb-1 light">
                        Kredi Yükle<i style="margin-left: 10px" class="fal fa-arrow-right"></i></p>
                </div>


            </a>
        </div>

    </div>

    <div class="row justify-content-center align-items-center my-5">
        <div class="col-md-6 col-lg-7 mb-4 mb-lg-0 ">

            <p class="text-center" style="font-size: 18px">
                Sadece <b>$14.68</b> ile Alan Adınıza Hemen Sahip Olun!
            </p>
            <form id="askDomainForm" method="POST" class="me-4 mb-3 mb-md-0">
                @csrf
                <div class="input-group input-group-rounded my-5">
                    <input class="form-control form-control-xl bg-light" placeholder="e-very" name="domainName"
                        id="domainName" type="email" />
                    <select name="domainTld" id="domainTld" class="form-control form-control-xl bg-light">
                        <option selected value="com.tr">.com.tr</option>
                        <option value="com">.com</option>
                        <option value="net">.net</option>
                        <option value="store">.store</option>
                    </select>
                    <button class="bg-blue-800 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-r" id="askDomainBtn"
                        type="button">
                        <strong>Kontrol Et</strong>
                    </button>
                </div>
            </form>
            <div id="domainUcret">
                <form action="/domainAl" method="POST">
                    @csrf
                    <div class="form-group" id="domainFormLabel">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- top kartlar end -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Card decks -->
            <div id="panel-9" class="panel mt-5">

                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="card-deck mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills float-left">
                                        <li class="nav-item">
                                            <h4>Alan Adlarım</h4>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-100 rounded-top px-2 border-bottom"></div>
                                <div class="container">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab1" data-bs-toggle="tab">Tümü (2)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab2" data-bs-toggle="tab">Aktif (1)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab3" data-bs-toggle="tab">İşlemde (0)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab4" data-bs-toggle="tab">Duraklatılmış (0)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab5" data-bs-toggle="tab">İptal (0)</a>
                                        </li>
                                    </ul>
                                    <div class="row mt-2 mb-1">
                                        <div class="col-lg-2">
                                            <select class="form-select form-control  " style="font-size: 14px "
                                                required="">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-3 ">
                                            <p style="font-size: 14px">Kayıt Göster</p>

                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab1" style="overflow-x: auto;">
                                            <table class="table table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            Ürün / Hizmet
                                                        </th>
                                                        <th>
                                                            Tutar
                                                        </th>
                                                        <th>
                                                            Son Ödeme Tarihi
                                                        </th>
                                                        <th>
                                                            Durum
                                                        </th>
                                                        <th>
                                                            İşlem
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            jventegre.com
                                                        </td>
                                                        <td>
                                                            276,09 ₺<br>Yıllık
                                                        </td>
                                                        <td>
                                                            15/02/2024
                                                        </td>
                                                        <td>
                                                            <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                        </td>
                                                        <td>

                                                            <button class="btn btn-custom " href="#">
                                                                <strong> <i class="fal fa-wrench"></i><br>Yönet</strong>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            dijitalka.com
                                                        </td>
                                                        <td>
                                                            109,91 ₺<br>Yıllık
                                                        </td>
                                                        <td>
                                                            29/10/2022
                                                        </td>
                                                        <td>
                                                            <i style="color: red" class="fal fa-circle"></i> Pasif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-disabled " href="#">
                                                                <strong> <i class="fal fa-wrench"></i><br>Yönet</strong>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row ">
                                                <div class="col ">
                                                    <div id="portfolioPagination" class="float-end ">
                                                        <ul class="pagination bootpag align-items-end justify-content-end">
                                                            <li data-lp="1" class="prev disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-left"></i></a></li>
                                                            <li data-lp="1" class="active page-item"><a
                                                                    href="javascript:void(0);" class="page-link">1</a>
                                                            </li>
                                                            <!-- <li data-lp="2" class="page-item"><a href="javascript:void(0);" class="page-linkz">2</a>
                                                                                                                                                                                                                                                                                                              </li> -->
                                                            <li data-lp="2" class="next disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2">
                                            <table class="table table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            Ürün / Hizmet
                                                        </th>
                                                        <th>
                                                            Tutar
                                                        </th>
                                                        <th>
                                                            Son Ödeme Tarihi
                                                        </th>
                                                        <th>
                                                            Durum
                                                        </th>
                                                        <th>
                                                            İşlem
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            jventegre.com
                                                        </td>
                                                        <td>
                                                            276,09 ₺<br>Yıllık
                                                        </td>
                                                        <td>
                                                            15/02/2024
                                                        </td>
                                                        <td>
                                                            <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                        </td>
                                                        <td>

                                                            <button class="btn btn-custom " href="#">
                                                                <strong> <i class="fal fa-wrench"></i><br>Yönet</strong>
                                                            </button>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <div class="row ">
                                                <div class="col ">
                                                    <div id="portfolioPagination" class="float-end ">
                                                        <ul class="pagination bootpag align-items-end justify-content-end">
                                                            <li data-lp="1" class="prev disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-left"></i></a></li>
                                                            <li data-lp="1" class="active page-item"><a
                                                                    href="javascript:void(0);" class="page-link">1</a>
                                                            </li>
                                                            <!-- <li data-lp="2" class="page-item"><a href="javascript:void(0);" class="page-linkz">2</a>
                                                                                                                                                                                                                                                                                                              </li> -->
                                                            <li data-lp="2" class="next disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3">
                                            <table class="table table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            Ürün / Hizmet
                                                        </th>
                                                        <th>
                                                            Tutar
                                                        </th>
                                                        <th>
                                                            Son Ödeme Tarihi
                                                        </th>
                                                        <th>
                                                            Durum
                                                        </th>
                                                        <th>
                                                            İşlem
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">



                                                </tbody>

                                            </table>
                                            <div class="row " style="background-color: #FCFCFC">
                                                <div class="col text-center mt-2">
                                                    <p style="font-size: 14px">Tabloda herhangi bir veri mevcut değil</p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ">
                                                    <div id="portfolioPagination" class="float-end ">
                                                        <ul class="pagination bootpag align-items-end justify-content-end">
                                                            <li data-lp="1" class="prev disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-left"></i></a></li>
                                                            <li data-lp="1" class="active page-item"><a
                                                                    href="javascript:void(0);" class="page-link">1</a>
                                                            </li>
                                                            <!-- <li data-lp="2" class="page-item"><a href="javascript:void(0);" class="page-linkz">2</a>
                                                                                                                                                                                                                                                                                                              </li> -->
                                                            <li data-lp="2" class="next disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4">
                                            <table class="table table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            Ürün / Hizmet
                                                        </th>
                                                        <th>
                                                            Tutar
                                                        </th>
                                                        <th>
                                                            Son Ödeme Tarihi
                                                        </th>
                                                        <th>
                                                            Durum
                                                        </th>
                                                        <th>
                                                            İşlem
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">



                                                </tbody>

                                            </table>
                                            <div class="row " style="background-color: #FCFCFC">
                                                <div class="col text-center mt-2">
                                                    <p style="font-size: 14px">Tabloda herhangi bir veri mevcut değil</p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ">
                                                    <div id="portfolioPagination" class="float-end ">
                                                        <ul class="pagination bootpag align-items-end justify-content-end">
                                                            <li data-lp="1" class="prev disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-left"></i></a></li>
                                                            <li data-lp="1" class="active page-item"><a
                                                                    href="javascript:void(0);" class="page-link">1</a>
                                                            </li>
                                                            <!-- <li data-lp="2" class="page-item"><a href="javascript:void(0);" class="page-linkz">2</a>
                                                                                                                                                                                                                                                                                                              </li> -->
                                                            <li data-lp="2" class="next disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab5">
                                            <table class="table table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>
                                                            Ürün / Hizmet
                                                        </th>
                                                        <th>
                                                            Tutar
                                                        </th>
                                                        <th>
                                                            Son Ödeme Tarihi
                                                        </th>
                                                        <th>
                                                            Durum
                                                        </th>
                                                        <th>
                                                            İşlem
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">



                                                </tbody>

                                            </table>
                                            <div class="row " style="background-color: #FCFCFC">
                                                <div class="col text-center mt-2">
                                                    <p style="font-size: 14px">Tabloda herhangi bir veri mevcut değil</p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ">
                                                    <div id="portfolioPagination" class="float-end ">
                                                        <ul class="pagination bootpag align-items-end justify-content-end">
                                                            <li data-lp="1" class="prev disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-left"></i></a></li>
                                                            <li data-lp="1" class="active page-item"><a
                                                                    href="javascript:void(0);" class="page-link">1</a>
                                                            </li>
                                                            <!-- <li data-lp="2" class="page-item"><a href="javascript:void(0);" class="page-linkz">2</a>
                                                                                                                                                                                                                                                                                                              </li> -->
                                                            <li data-lp="2" class="next disabled page-item"><a
                                                                    href="javascript:void(0);" class="page-link"><i
                                                                        class="fal fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills float-left">
                                        <li class="nav-item">
                                            <h4>Son Siparişlerim</h4>
                                        </li>

                                    </ul>
                                    <p>
                                </div>
                                <div class="row" style="overflow-x: auto;">
                                    <div class="col-12">
                                        <table class="table table-striped">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>
                                                        Ürün / Hizmet
                                                    </th>
                                                    <th>
                                                        Tutar
                                                    </th>
                                                    <th>
                                                        Son Ödeme Tarihi
                                                    </th>
                                                    <th>
                                                        Durum
                                                    </th>
                                                    <th>
                                                        İşlem
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>
                                                        jventegre.com
                                                    </td>
                                                    <td>
                                                        276,09 ₺<br>Yıllık
                                                    </td>
                                                    <td>
                                                        15/02/2024
                                                    </td>
                                                    <td>
                                                        <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-custom " href="#">
                                                            <strong> <i class="fal fa-wrench"></i></strong>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        jventegre.com
                                                    </td>
                                                    <td>
                                                        276,09 ₺<br>Yıllık
                                                    </td>
                                                    <td>
                                                        15/02/2024
                                                    </td>
                                                    <td>
                                                        <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-custom " href="#">
                                                            <strong> <i class="fal fa-wrench"></i></strong>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        jventegre.com
                                                    </td>
                                                    <td>
                                                        276,09 ₺<br>Yıllık
                                                    </td>
                                                    <td>
                                                        15/02/2024
                                                    </td>
                                                    <td>
                                                        <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-custom " href="#">
                                                            <strong> <i class="fal fa-wrench"></i></strong>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        jventegre.com
                                                    </td>
                                                    <td>
                                                        276,09 ₺<br>Yıllık
                                                    </td>
                                                    <td>
                                                        15/02/2024
                                                    </td>
                                                    <td>
                                                        <i style="color: #69CCA4" class="fal fa-circle"></i> Aktif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-custom " href="#">
                                                            <strong> <i class="fal fa-wrench"></i></strong>
                                                        </button>
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>
                                        <div class="row " style="margin-right: 10px">
                                            <div class="col ">
                                                <div id="portfolioPagination" class="float-end ">
                                                    <ul class="pagination bootpag align-items-end justify-content-end ">
                                                        <li data-lp="1" class="prev disabled page-item"><a
                                                                href="javascript:void(0);" class="page-link"><i
                                                                    class="fal fa-angle-left"></i></a></li>
                                                        <li data-lp="1" class="active page-item"><a
                                                                href="javascript:void(0);" class="page-link">1</a></li>
                                                        <li data-lp="2" class="page-item"><a
                                                                href="javascript:void(0);" class="page-linkz">2</a>
                                                        </li>
                                                        <li data-lp="2" class="next page-item"><a
                                                                href="javascript:void(0);" class="page-linkx"><i
                                                                    class="fal fa-angle-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#askDomainBtn").click(function(e) {
                e.preventDefault();
                let timerInterval
                Swal.fire({
                    title: 'Domain Adresi Sorgulanıyor!',
                    html: 'Bu işlem yaklaşık olarak <b></b> milisaniye sonra tamamlanacaktır.',
                    timer: 6000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 300)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
                $.ajax({
                    url: '/domainUcret',
                    type: 'POST',
                    data: $('#askDomainForm').serialize(),
                    success: function(data) {
                        let res = JSON.parse(data);
                        console.log(res);
                        $('#domainFormLabel').html(res.sorguCevap);
                        /*
                        $("#buyDomain").click(function(e) {
                            $.ajax({
                                url: '/domainAl',
                                type: 'POST',
                                data: $('#askDomainForm').serialize(),

                                success: function(response) {
                                    window.location.href =
                                        '/domainSatinAl?result=' +
                                        response;
                                }
                            });
                        });
                        */
                    }
                });
            });
        });
    </script>
@endsection
