@extends('panel.layout')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 data-title-border>Pazaryeri Entegrasyonları</h1>
            </div>
            <div class="col-md-4 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end">
                    <li><a href="index" class="text-light">Anasayfa</a></li>
                    <li class="active">Pazaryeri Entegrasyonları</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="spacer my-5"></div>
    <section class="section section-height-5 section-with-shape-divider border-0 lazyload ">
        <div class="spacer py-3 img-fluid">
            <div class="row">
                <div class="col-md-6 img-fluid text-sm-center">
                    <img class="img-fluid" src="{{ asset('img/pazaryeri-entegrasyonlari/pazaryeri.png') }}"
                        alt="Pazaryeri Entegrasyonu" title="Pazaryeri Entegrasyonu">
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="d-inline-block">
                                    <img src="{{ asset('img/pazaryeri-entegrasyonlari/trendyol.png') }}"
                                        alt="Trendyol.com Entegrasyonu" title="Trendyol.com Entegrasyonu">
                                </a>
                                <a href="#" class="d-inline-block">
                                    <img src="{{ asset('img/pazaryeri-entegrasyonlari/hepsiburada.png') }}"
                                        alt="Hepsiburada.com Entegrasyonu" title="Akakçe.com Entegrasyonu">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>Pazaryeri Entegrasyonu</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>
                                    E-ticaret sitenizdeki tüm ürünler veya seçtiğiniz ürünler pazaryerlerinde yayınlanır.
                                    Gene bu pazar yerlerinden gelen tüm siparişler e-ticaret sitenize aktarılır.
                                </p>
                                <ul>
                                    <li>Her pazar yerine özel fiyat tanımı yapabilme imkanı,</li>
                                    <li>Kategori bazında fiyat tanımı yapabilme imkanı,</li>
                                    <li>Toplu fiyat tanımı yapabilme imkanı,</li>
                                    <li>Bir platformdan sipariş geldiğinde e-ticaret sitenizde stok düşme özelliği,</li>
                                    <li>Ürün stok ve fiyat değişikliğinin pazar yerlerinde toplu olarak güncellenebilmesi
                                    </li>
                                </ul>
                                <p>gibi onlarca özellikle ile pazar yerlerinde hızlı aksiyonlar alabilirsiniz.</p>
                                <div class="col-12">
                                    <a href="https://e-very.com.tr/profesyonel-e-ticaret-paketlerimiz">
                                        <button type="button" class="col-6 btn btn-primary btn-lg">SATIN AL</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 Space box"></div>
            </div>
        </div>
    </section>

    <div class="spacer my-5"></div>
    <section class="section section-height-5 section-with-shape-divider border-0 lazyload ">
        <div class="spacer py-2 my-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-center text-center">
                            <a href="#" class="">
                                <img src="{{ asset('img/pazaryeri-entegrasyonlari/trendyol.png') }}"
                                    alt="Trendyol.com Entegrasyonu" title="Trendyol.com Entegrasyonu">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Trendyol Entegrasyonu</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 m-3">
                                <p>
                                    E-ticaret sitenizde ürünlerin satışı sağlanırken, Trendyol entegrasyonu aracılığıyla
                                    istediğiniz tüm ürünleri bu pazaryerinde kolayca yayınlayabilirsiniz;
                                </p>
                                <ul class="">
                                    <li>E-ticaret sitenizin yönetici paneline entegre olan, çok pratik bir kullanıma ve
                                        arayüze sahip E-very Trendyol entegrasyonuyla bir çok veriye otomatik erişim
                                        sağlayabilirsiniz,</li>
                                    <li>Trendyol’da satış yapan tedarikçi firmaysanız E-very pazaryeri entegrasyonu ile
                                        kolayca veri bağlantılarınızı kurabilirsiniz,</li>
                                    <li>Her gün güncellemeyle fiyat, stok miktarları vs.otomatik olarak yapabilirsiniz.</li>
                                    <p>E-very işlemlerin hepsini sizin için takip eder. Trendyol'dan gelen siparişin
                                        e-ticaret sitenize aktarılır.</p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <a href="https://e-very.com.tr/profesyonel-e-ticaret-paketlerimiz">
                            <button type="button" class="col-6 btn btn-primary btn-lg">SATIN AL</button>
                        </a>
                    </div>
                </div>
                <div class="col-12 Space box"></div>
            </div>
        </div>
    </section>
    <div class="spacer my-5"></div>
    <section class="section section-height-5 section-with-shape-divider border-0 lazyload my-5">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center d-flex justify-center">
                        <a href="#">
                            <img src="{{ asset('img/pazaryeri-entegrasyonlari/hepsiburada.png') }}"
                                alt="hepsiburada.com Entegrasyonu" title="hepsiburada.com Entegrasyonu">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Hepsiburada Entegrasyonu</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 m-3">
                            <p>
                                E-ticaret sitenizdeki dilediğiniz tüm ürünler Hepsiburada'da listeyip
                                güncelleyebilirsiniz. Hepsiburada'dan gelen tüm siparişler otomaitik olarak e-ticaret
                                sitenize işlenir.
                            </p>
                            <ul class="">
                                <li>Hepsiburada'dan gelen siparişin e-ticaret sitenize aktarılması,</li>
                                <li>Hepsiburada'da sipariş edilen ürünün stok bilgisinin sisteminize yansıması,</li>
                                <li>Hepsiburada'daki ürünlerinizin stok ve fiyat bilgilerini toplu olarak e-ticaret
                                    sitenizdeki stok ve fiyat bilgileri ile senkronize edebilme</li>
                            </ul>
                            <p>ve daha bir çok özellik ile hepsiburada ‘da hızlı aksiyonlar alabilirsiniz.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="https://e-very.com.tr/profesyonel-e-ticaret-paketlerimiz">
                        <button type="button" class="col-6 btn btn-primary btn-lg">SATIN AL</button>
                    </a>
                </div>
            </div>
            <div class="col-12 Space box"></div>
        </div>
    </section>
@endsection
