@extends('panel.layout')
@php
    $username = Auth::user()->name;
    $parcalar = explode(' ', $username);
    $soyad = array_pop($parcalar);
    $soyad = ucwords($soyad);
    $ad = ucwords(implode(' ', $parcalar));
@endphp
@section('css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
@section('content')
    <form method="POST" id="domainRegister">
        @csrf
        <h2 class="text-decoration-underline text-2xl font-bold text-center">
            Domain Bilgileri</h2>
        <div class="row my-5">
            <div class="form-group col-md-6">
                <label for="" class="form-label text-decoration-underline text-2xl font-bold">Satın almak istediğiniz
                    domainin
                    Adı</label>
                <input type="text" class="form-input w-100" readonly value="{{ $data['domainName'] }}">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label text-decoration-underline text-2xl font-bold">Domain
                    Uzantisi</label>
                <input type="text" class="form-input w-100" readonly value="{{ $data['dUzanti'] }}">
            </div>
            <input type="hidden" name="domainName" value="{{ $data['domainName'] }}">
            <input type="hidden" name="dUzanti" value="{{ $data['dUzanti'] }}">
            <input type="hidden" name="tutar" value="{{ $data['tutar'] }}">

            <div class="form-group col-md-3">
                <label for="" class="form-label text-decoration-underline text-2xl font-bold">Domain Tutarı</label>
                <input type="text" class="bg-green-500 text-2xl font-bold form-input w-100" readonly
                    value="{{ $data['tutar'] . ' TL' }}">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Ad</label>
                <input type="text" class="form-input w-100" value="{{ $ad }}" id="domainFirstName"
                    name="domainFirstName">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Soyad</label>
                <input type="text" class="form-input w-100" value="{{ $soyad }}" id="domainLastName"
                    name="domainLastName">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-input w-100" value="{{ Auth::user()->email }}" id="domainEmail"
                    name="domainEmail">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Şirket Adı</label>
                <input type="text" class="form-input w-100" id="domainCompany" name="domainCompany">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Telefon No</label>
                <input type="text" class="form-input w-100" value="{{ Auth::user()->telephone }}" id="domainPhone"
                    name="domainPhone" placeholder="Lütfen başında sıfır olmadan 10 hameli telefon numarasını giriniz ">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Fax No</label>
                <input type="text" class="form-input w-100" value="{{ Auth::user()->telephone }}" id="domainFax"
                    name="domainFax" placeholder="Lütfen başında sıfır olmadan 10 hameli telefon numarasını giriniz ">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">Adres</label>
                <input type="text" class="form-input w-100" name="domainAddress" id="domainAddress">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">İl</label>
                <input type="text" class="form-input w-100" id="domainIl" name="domainIl">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="form-label">İlçe</label>
                <input type="text" class="form-input w-100" id="domainIlce" name="domainIlce">
            </div>
        </div>
        <h2 class="my-5 text-decoration-underline text-2xl font-bold text-center">
            Ödeme Bilgileri</h2>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Kart Üzerindeki Ad
                    Soyad</label>
                <input type="text" class="form-input w-100" name="cardHolder" id="cardHolder">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Kart Numarası</label>
                <input type="text" class="form-input w-100" name="cardNumber" id="cardNumber">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Son Kullanma
                    AY</label>
                <input type="text" class="form-input w-100" name="cardMonth" id="month">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Son Kullanma
                    YIL</label>
                <input type="text" class="form-input w-100" name="cardYear" id="year">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Cvc Kodu</label>
                <input type="text" class="form-input w-100" name="cardCvc" id="cvc">
            </div>
        </div>
        <input type="hidden" name="islem_tipi" value="domainKayit">
        <div class="row">
            <div class="col-md-6 offset-md-3 my-5">
                <button type="button"
                    class="bg-blue-800 w-100 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-r"
                    id="btn-register">Satın AL</button>
            </div>
        </div>


    </form>


    <div class="modal fade w-100 h-100" id="odemeSonuc" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="odemeSonucLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered h-100">
            <div class="modal-content h-100 w-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="odemeSonucLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body h-100 w-100">
                    <iframe src="" id="odemeFrameParam" class="h-100 w-100" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="bg-red-900 w-100 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $("#btn-register").click(function(e) {
            data = $("#domainRegister").serialize();
            $.ajax({
                url: "/buyDomain",
                type: "POST",
                data: data,
                success: function(response) {
                    if (response == 'failed') {
                        $("#sorguCevap").html('Domain adı bulunamadı.');
                        setTimeout(function() {
                            $("#sorguCevap").html('');
                        }, 3000);
                        return false;
                    }
                    setTimeout(function() {
                        $("#odemeSonuc").css("z-index", "9999");
                        $("#odemeSonuc").modal("show");
                        $("#odemeFrameParam").attr("src", response);
                        // window.location = response;
                    }, 100);
                }
            });
        });
    </script>
@endsection
