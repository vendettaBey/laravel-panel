@extends('panel.layout')
<style>
    .full-content {
        display: none;
    }

    .show-more,
    .show-less {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
        display: inline;
    }

    .show-less {
        display: none;
    }
</style>



@section('content')
    <div class="row p-5">
        @foreach ($moduller as $modul)
            <div class="col-md-6 my-5">
                <div class="max-w-md card mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48"
                                src="{{ asset("adminassets/upload/modul/$modul->modul_resim") }}" alt="Resim Açıklaması">
                        </div>
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                {{ $modul->modul_name }}</div>
                            <a href="#"
                                class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $modul->modul_fiyat }}</a>
                            <p class="mt-2 text-gray-500">
                            <p class="mb-2">{!! $custom->kisalt($modul->modul_aciklama, 100) !!}</p>
                            <button data-bs-toggle="modal" data-bs-target="#modulModal"
                                data-product-id="{{ $modul->id }}"
                                class="bg-blue-500 buy-button hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Satın Al
                            </button>

                        </div>
                    </div>
                </div>


            </div>
        @endforeach
    </div>


    <div class="modal fade h-100 w-100" id="modulModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg h-100 w-100 modal-fullscreen">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="modal-content h-100 w-100">
                        <div class="modal-header">
                            <h1 class="modal-title w-100 text-center" id="staticBackdropLabel">
                                Modül Satın Al
                            </h1>
                            <button type="button" class="btn-close text-2xl" data-bs-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body h-100 w-100">
                            <form id="modulForm" action="/modulSatinAl" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" id="modalContent">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bg-transparent text-dark w-100" for="">Kart
                                                Sahibi</label>
                                            <input type="text" class="form-control w-100" required name="cardHolder"
                                                id="cardHolder">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="bg-transparent text-dark w-100">Kart
                                                Numarası</label>
                                            <input type="text" class="form-control w-100" required
                                                name="cardNumber"id="cardNumber">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                        <div class="form-group">
                                            <label for="" class="bg-transparent text-dark w-100">Ay</label>
                                            <select name="cardMonth" id="cardMonth" class="form-control">
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
                                            <label class="bg-transparent text-dark w-100" for="">Yıl</label>
                                            <select name="cardYear" id="cardYear" class="form-control">
                                                @for ($i = date('Y'); $i < date('Y') + 18; $i++)
                                                    <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 w-33">
                                        <div class="form-group">
                                            <label for="" class="bg-transparent text-dark w-100">Cvc</label>
                                            <input type="number" class="form-control w-100" required name="cardCvc"
                                                placeholder="_ _ _" id="cardCvc">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-5">
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
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ödeme
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

            var buyButtons = document.querySelectorAll('.buy-button');

            // Her satın al düğmesi için olay dinleyicisi ekleyin
            buyButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Ürün kimliğini alın
                    var productId = button.getAttribute('data-product-id');

                    // AJAX isteği göndererek ürün bilgilerini alın
                    $.ajax({
                        url: '/modul/' + productId,
                        method: 'GET',
                        success: function(response) {
                            // Başarılı bir şekilde veri alındığında işlemleri yapın
                            let product = response;
                            $("#modalContent").html(product);

                        },
                        error: function(error) {
                            // Hata durumunda işlemleri yapabilirsiniz
                        }
                    });
                });
            });

            var form = $("#modulForm");
            form.submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: form.attr("action"),
                    method: form.attr("method"),
                    data: form.serialize(),
                    success: function(response) {
                        window.location.href = response;
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            });


        });
    </script>

    @if (session('errorModul'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Ödeme işlemi iptal edildi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @php
            session()->forget('errorModul');
        @endphp
    @endif
    @if (session('successModul'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Ödeme işlemi başarılı . Modülünüz en kısa sürede aktif olacaktır',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @php
            session()->forget('successModul');
        @endphp
    @endif
@endsection
