@extends('panel.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/hirsiz.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container" id="tepenintepesi">
            <div class="row mx-0">
                <div class="col-12 py-2 text-center">
                    <h1 class="col-12 p-3 text-center fs-4 fs-md-5 fs-sm-6 fs-xs-7 fw-bold rounded bg-light">E-Ticaret
                        Sitesi Paketleri ve Fiyatları</h1>
                </div>
            </div>




            <div class="row mx-0 y2-ust-paket-kutular-cerceve" style="position: sticky; top: 0px; z-index: 999;">
                <div class="d-none d-md-block col-3 p-4 fs-4 y2-paket-kutu" style=" background: #fff; color:#000;">
                    <div class="col-12 fs-md-6 fw-bold y2-ust-paket-kutular-aciklama" style="line-height:35px;">
                        İhtiyacınız olan paketi birlikte belirleyelim</div>
                    <div class="col-12 fs-8 fs-md-10 mt-1 y2-ust-paket-kutular-aciklama" style="">İhtiyacınıza en
                        uygun
                        paketi seçmek için uzmanlarımızdan yardım alabilirsiniz.</div>
                    <div class="col-12 my-2 justify-content-start">
                        <a href="#" class="mb-1 mt-1 me-1 btn col-12" style="background-color:#00285b; color:#fff;"><i
                                class="fa-solid fa-phone" style="color:#fff;"></i><span class="ms-2">Bizi
                                Arayın</span></a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm p-2 fw-bold text-center y2-paket-kutu py-4">
                    <div class="col-12 fs-5 fs-sm-20 fs-xs-9 py-1 y2-paket-baslik">Girişimci</span></div>
                    <div class="col-12 fs-6 fs-sm-15 fs-xs-10 py-1 fw-normal"><span style="color:#242f51;">Ücretsiz
                    </div>
                    <div class="col-12 fs-4 fs-sm-13 fs-xs-8 py-1 fw-bold y2-paket-baslik-fiyat">0 <span
                            class="fs-6 fs-sm-15 fs-xs-10">TL</span></div>
                    <div class="col-12 fs-7 fs-sm-12 fs-xs-12 py-1 fw-normal y2-paket-baslik-fiyat"><span
                            style="font-size:8px;">Süre Sınırsız</span></div>
                    <!-- <div class="col-12 text-center my-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="col-auto col-lg-8 mx-auto p-1 px-1 vstack fs-8 fs-sm-10 fs-xs-12 text-center bg-white border text-dark rounded-3 fw-normal">Demoyu İncele</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

                    <button type="button"
                        class="col-auto col-lg-8 p-1 my-2 px-1 fs-8 fs-sm-10 fs-xs-12 w-100 text-center text-white border rounded-3 fw-normal"
                        data-bs-toggle="modal" data-bs-target="#free" style="background-color:#1573e6;">
                        BAŞLA
                    </button>
                </div>
                <div class="col-md-3 col-xs-12 col-sm p-2 fw-bold text-center y2-paket-baslik y2-paket-kutu2 py-4">
                    <div class="col-12 fs-5 fs-sm-20 fs-xs-9 py-1 y2-paket-baslik">Kobi</div>
                    <div class="col-12 fs-6 fs-sm-15 fs-xs-10 py-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">249 TL
                    </div>
                    <div class="col-12 fs-4 fs-sm-5 fs-xs-8 py-1 fw-bold y2-paket-baslik-fiyat">99 <span
                            class="fs-6 fs-sm-8 fs-xs-10">TL / ay</span></div>
                    <div class="col-12 fs-7 fs-sm-12 fs-xs-12 py-1 fw-normal y2-paket-baslik-fiyat"><span
                            style="font-size:8px;">Kobiler için en ideali</span></div>
                    <!-- <div class="col-12 text-center my-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="col-auto col-lg-8 mx-auto p-1 px-1 vstack fs-8 fs-sm-10 fs-xs-12 text-center bg-white border text-dark rounded-3 fw-normal">Demoyu İncele</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

                    <div class="col-12 text-center my-2">
                        <button type="button"
                            class="col-auto col-lg-8 p-1 my-2 px-1 fs-8 fs-sm-10 fs-xs-12 w-100 text-center text-white border rounded-3 fw-normal"
                            data-bs-toggle="modal" data-bs-target="#kobi" style="background-color:#1573e6;">
                            BAŞLA
                        </button>
                    </div>
                </div>

                <div class="col-md-3 p-2 fw-bold text-center y2-paket-baslik y2-paket-kutu3 py-4">
                    <div class="col-12 fs-5 fs-sm-13 fs-xs-9 py-1 y2-paket-baslik">Kurumsal</div>
                    <div class="col-12 fs-6 fs-sm-15 fs-xs-10 py-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">449 TL
                    </div>
                    <div class="col-12 fs-4 fs-sm-5 fs-xs-8 py-1 fw-bold y2-paket-baslik-fiyat">249 <span
                            class="fs-6 fs-sm-10 fs-xs-10">TL</span></div>
                    <div class="col-12 fs-7 fs-sm-12 fs-xs-12 py-1 fw-normal y2-paket-baslik-fiyat"><span
                            style="font-size:8px;"><a href="tel:08504804452"
                                style="text-decoration:none; color:#000;">Müşteri Temsilciniz</a></span></div>


                    <div class="col-12 text-center my-2">
                        <button type="button"
                            class="col-auto col-lg-8 p-1 my-2 px-1 fs-8 fs-sm-10 fs-xs-12 w-100 text-center text-white border rounded-3 fw-normal"
                            data-bs-toggle="modal" data-bs-target="#kurumsal" style="background-color:#1573e6;">
                            BAŞLA
                        </button>
                    </div>
                </div>
                <!-- <hr style="height:1px; background-color:#fff;"> -->
            </div>


        </div>

        <div class="modal fade h-100 w-100" id="free" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog h-100 w-100 modal-lg">
                <div class="modal-content h-100 w-100">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body h-100 w-100">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, accusantium.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-primary">İletişime Geç</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade h-100 w-100" id="kobi" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="kobiLabel" aria-hidden="true">
            <div class="modal-dialog h-100 w-100 modal-fullscreen">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="modal-content h-100 w-100">
                            <div class="modal-header">
                                <h1 class="modal-title text-2xl w-100 text-center font-bold" id="staticBackdropLabel">
                                    Kobi
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body h-100 w-100">
                                <h4 class="text-center fw-bold">Tercih Ettiğiniz Planı Seçiniz</h4>
                                <form id="kobiForm" action="/eticaretPaketSatinAl" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 w-50">
                                            <label class="w-100" for="kobiPaket">
                                                <input type="radio" name="kobiPaket" id="kobiPaket" class="d-none"
                                                    value="99">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 aylikKobi fw-bold text-center y2-paket-baslik y2-paket-kutu3 py-4">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-md-12 wb fs-5 fs-sm-16 fs-xs-7 py-lg-1 y2-paket-baslik">
                                                                        Ay</div>
                                                                    <div
                                                                        class="col-md-12 wb fs-6 fs-sm-18 fs-xs-8 py-lg-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">
                                                                        249 TL
                                                                    </div>
                                                                    <div
                                                                        class="col-md-12 wb fs-4 fs-sm-8 fs-xs-4 py-lg-1 fw-bold y2-paket-baslik-fiyat">
                                                                        99 <span
                                                                            class="fs-6 wb fs-sm-12 fs-xs-10">TL</span>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-12 wb fs-7 fs-sm-10 fs-xs-10 py-lg-1 fw-normal y2-paket-baslik-fiyat">
                                                                        <span style="font-size:10px;">
                                                                            Aylık Ödeme
                                                                        </span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-6 w-50">
                                            <label class="w-100" for="kobiPaket2">
                                                <input type="radio" value="990" class="d-none" name="kobiPaket"
                                                    id="kobiPaket2">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 yillikKobi fw-bold text-center y2-paket-baslik y2-paket-kutu3 py-4">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-md-12  bw fs-5 fs-sm-13 fs-xs-7 py-lg-1 y2-paket-baslik">
                                                                        Yıl</div>
                                                                    <div
                                                                        class="col-md-12 bw fs-6 fs-sm-15 fs-xs-8 py-lg-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">
                                                                        2988 TL
                                                                    </div>
                                                                    <div
                                                                        class="col-md-12 bw fs-4 fs-sm-5 fs-xs-4 py-lg-1 fw-bold y2-paket-baslik-fiyat">
                                                                        990 <span
                                                                            class="fs-6 bw fs-sm-10 fs-xs-10">TL</span>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-12 bw fs-7 fs-sm-10 fs-xs-10 py-lg-1 fw-normal y2-paket-baslik-fiyat">
                                                                        <span style="font-size:10px;">
                                                                            2 Ay Ücretsiz</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <input type="hidden" name="urun" value="kobi">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bg-transparent text-xl text-dark w-100"
                                                    for="cardHolder">Kart
                                                    Sahibi</label>
                                                <input type="text" class="form-input w-100" required name="cardHolder"
                                                    placeholder="Adınız Soyadınız" id="cardHolder">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="cardNumber"
                                                    class="bg-transparent text-xl text-dark w-100">Kart
                                                    Numarası</label>
                                                <input type="text" class="form-input w-100" required name="cardNumber"
                                                    placeholder="____ ____ ___ ___" id="cardNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label for="cardMonth" class="bg-transparent text-dark w-full">Ay</label>
                                                <select name="cardMonth" id="cardMonth" class="form-select">
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label class="bg-transparent text-dark w-full" for="cardYear">Yıl</label>
                                                <select name="cardYear" id="cardYear" class="form-select">
                                                    @for ($i = date('Y'); $i < date('Y') + 18; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label for="cardCvc" class="bg-transparent text-dark w-full">Cvc</label>
                                                <input type="number" class="form-input w-full" required name="cardCvc"
                                                    placeholder="_ _ _" id="cardCvc">
                                            </div>
                                        </div>
                                        <div class="col-md-12 my-3">
                                            <div class="form-group">
                                                <div class="checkbox-wrapper-19 text-dark">

                                                    <input type="checkbox" name="sozlesme" required id="cbtest-19" />
                                                    <label for="cbtest-19" class="check-box text-dark">
                                                    </label>
                                                    <a href="{{ asset('plesk/files/e-verykvkk.pdf') }}" target="_blank"
                                                        class="text-dark ms-1">KVKK
                                                        Aydınlatma
                                                        Metni</a> 'ni okudum ve
                                                    onaylıyorum.

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block text-white my-2">Ödeme
                                        Yap</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade h-100 w-100" id="kurumsal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog h-100 w-100 modal-fullscreen">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="modal-content h-100 w-100">
                            <div class="modal-header">
                                <h1 class="modal-title w-100 text-center" id="staticBackdropLabel">
                                    Kurumsal
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body h-100 w-100">
                                <h4 class="text-center fw-bold">Tercih Ettiğiniz Planı Seçiniz</h4>
                                <form id="kurumsalForm" action="/eticaretPaketSatinAl" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 w-50">
                                                    <label class="w-100" for="kurumsalPaket">
                                                        <input type="radio" name="kurumsalPaket" id="kurumsalPaket"
                                                            class="d-none" value="249">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-md-12 aylikKurumsal fw-bold text-center y2-paket-baslik y2-paket-kutu3 py-4">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-md-12 fs-5 wb fs-sm-7 fs-xs-7 py-lg-1 y2-paket-baslik">
                                                                                Ay</div>
                                                                            <div
                                                                                class="col-md-12 fs-6 wb fs-sm-8 fs-xs-8 py-lg-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">
                                                                                449 TL
                                                                            </div>
                                                                            <div
                                                                                class="col-md-12 fs-4 wb fs-sm-4 fs-xs-4 py-lg-1 fw-bold y2-paket-baslik-fiyat">
                                                                                249 <span
                                                                                    class="fs-6 fs-sm-10 wb fs-xs-10">TL</span>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-12 fs-7 wb fs-sm-10 fs-xs-10 py-lg-1 fw-normal y2-paket-baslik-fiyat">
                                                                                <span style="font-size:10px;">
                                                                                    Aylık Ödeme
                                                                                </span>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 w-50">
                                                    <label class="w-100" for="kurumsalPaket2">
                                                        <input type="radio" value="2490" class="d-none"
                                                            name="kurumsalPaket" id="kurumsalPaket2">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-md-12 yillikKurumsal text-white fw-bold text-center y2-paket-baslik y2-paket-kutu3 py-4">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-md-12 bw fs-5 fs-sm-8 fs-xs-7 py-lg-1 y2-paket-baslik">
                                                                                Yıl</div>
                                                                            <div
                                                                                class="col-md-12 bw fs-6 fs-sm-8 fs-xs-8 py-lg-1 fw-normal y2-paket-baslik-ustu-cizili-fiyat">
                                                                                5388 TL
                                                                            </div>
                                                                            <div
                                                                                class="col-md-12 fs-4 bw fs-sm-4 fs-xs-4 py-lg-1 fw-bold y2-paket-baslik-fiyat">
                                                                                2499 <span
                                                                                    class="fs-6 fs-sm-10 bw fs-xs-10">TL</span>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-12 fs-7 bw fs-sm-10 fs-xs-10 py-lg-1 fw-normal y2-paket-baslik-fiyat">
                                                                                <span style="font-size:10px;">
                                                                                    2 Ay Ücretsiz</span>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bg-transparent text-dark w-100" for="">Kart
                                                    Sahibi</label>
                                                <input type="text" class="form-input w-100" required name="cardHolder"
                                                    placeholder="Adınız Soyadınız" id="cardHolder">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label for="" class="bg-transparent text-dark w-100">Kart
                                                    Numarası</label>
                                                <input type="text" class="form-input w-100" required name="cardNumber"
                                                    placeholder="____ ____ ___ ___" id="cardNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label for="cardMonth" class="bg-transparent text-dark w-full">Ay</label>
                                                <select name="cardMonth" id="cardMonth" class="form-select">
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label class="bg-transparent text-dark w-full" for="cardYear">Yıl</label>
                                                <select name="cardYear" id="cardYear" class="form-select">
                                                    @for ($i = date('Y'); $i < date('Y') + 18; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                            <div class="form-group">
                                                <label for="cardCvc" class="bg-transparent text-dark w-full">Cvc</label>
                                                <input type="number" class="form-input w-full" required name="cardCvc"
                                                    placeholder="_ _ _" id="cardCvc">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="urun" value="kurumsal">
                                    <div class="col-md-12 my-3">
                                        <div class="form-group">
                                            <div class="checkbox-wrapper-18 text-dark">

                                                <input type="checkbox" name="sozlesme" required id="cbtest-18" />
                                                <label for="cbtest-18" class="check-box text-dark">
                                                </label>
                                                <a href="{{ asset('plesk/files/e-verykvkk.pdf') }}" target="_blank"
                                                    class="text-dark ms-1">KVKK
                                                    Aydınlatma
                                                    Metni</a> 'ni okudum ve
                                                onaylıyorum.
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white btn-block">Ödeme
                                        Yap</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function() {
                $(".form-control").focus(function() {
                    $(this).css("border-color", "green");
                    $(this).css("background-color", "azure");
                });
                $(".modal-content").css("background-color", "#F9F9F9");
                $('.bw').css("color", "#000");
                $('.wb').css("color", "#000");
                $("#kobiPaket").change(function() {
                    $(".aylikKobi").css("background-color", "#1573e6");
                    $(".wb").css("color", "#fff");
                    $(".bw").css("color", "#000");
                    $(".aylikKobi").css("border", "7px solid navy");
                    $(".aylikKobi").css("border-radius", "7px");
                    $(".yillikKobi").css("border", "none");
                    $(".yillikKobi").css("background-color", "#d6d6d6");
                });

                $("#kobiPaket2").change(function() {
                    $(".yillikKobi").css("background-color", "#1573e6");
                    $(".yillikKobi").css("color", "#fff");
                    $(".aylikKobi").css("border", "none");
                    $(".bw").css("color", "#fff");
                    $(".wb").css("color", "#000");
                    $(".yillikKobi").css("border", "7px solid navy");
                    $(".yillikKobi").css("border-radius", "7px");
                    $(".aylikKobi").css("background-color", "#d6d6d6");
                });

                $("#kurumsalPaket").change(function() {
                    $(".aylikKurumsal").css("background-color", "#1573e6");
                    $(".aylikKurumsal").css("border", "7px solid navy");
                    $(".aylikKurumsal").css("border-radius", "7px");
                    $(".wb").css("color", "#fff");
                    $(".bw").css("color", "#000");
                    $(".yillikKurumsal").css("border", "none");
                    $(".yillikKurumsal").css("background-color", "#d6d6d6");
                });

                $("#kurumsalPaket2").change(function() {
                    $(".yillikKurumsal").css("background-color", "#1573e6");
                    $(".yillikKurumsal").css("border", "7px solid navy");
                    $(".yillikKurumsal").css("border-radius", "7px");
                    $(".bw").css("color", "#fff");
                    $(".wb").css("color", "#000");
                    $(".aylikKurumsal").css("border", "none");
                    $(".aylikKurumsal").css("background-color", "#d6d6d6");
                });

                $('#kobiForm').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var data = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(response) {
                            window.location = response;
                        }
                    });
                });
                $('#kurumsalForm').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var data = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(response) {
                            window.location = response;
                        }
                    });
                });
            });
        </script>

        @if (session('error'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata',
                        text: '{{ session('error') }}',
                        confirmButtonText: 'Tamam',
                        confirmButtonColor: '#1573e6',
                        timer: 5000
                    })
                });
            </script>
            @php
                session()->forget('error');
            @endphp
        @endif
    @endsection
