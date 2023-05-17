@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-2xl font-bold text-center">{{ $modul->modul_name . ' Modülünü Düzenle' }}</h2>
            <form action="{{ route('moduls.update', $modul->id) }}" enctype="multipart/form-data" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulAdi">
                        Modül Adı
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_adi" name="modul_adi" type="text" value="{{ $modul->modul_name }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulAciklama">
                        Modül Açıklama
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_aciklama" name="modul_aciklama">{{ $modul->modul_aciklama }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulResmi">
                        Modül Resmi
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_resmi" name="modul_resmi" value="{{ $modul->modul_resim }}" type="file">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulFiyati">
                        Modül Fiyatı
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_fiyati" name="modul_fiyati" type="text" value="{{ $modul->modul_fiyat }}">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
