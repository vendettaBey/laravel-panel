@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2 class="text-2xl font-bold text-center">Yeni İlave Modül Ekle</h2>
            <form action="{{ route('moduls.store') }}" enctype="multipart/form-data" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulAdi">
                        Modül Adı
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_adi" name="modul_adi" type="text" placeholder="Modül Adı">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulAciklama">
                        Modül Açıklama
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_aciklama" name="modul_aciklama" placeholder="Modül Açıklama"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulResmi">
                        Modül Resmi
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_resmi" name="modul_resmi" type="file">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="modulFiyati">
                        Modül Fiyatı
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="modul_fiyati" name="modul_fiyati" type="number" placeholder="Modül Fiyatı">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Kaydet
                    </button>
                </div>
            </form>


        </div>
        <div class="col-md-8">

            <h2 class="text-2xl font-bold text-center">İlave Modüller</h2>
            <h4 class="text-end">
                <form action="/truncateTable">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Tümünü
                        Sil</button>
                </form>
            </h4>
            <table class="m-w-full table-fixed border border-gray-200 divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">#</th>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">Modül
                            Adı</th>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">Modül
                            Açıklama</th>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">Modül
                            Resmi</th>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">Modül
                            Fiyatı</th>
                        <th class="border-b-2 border-black hover:border-blue-500 hover:text-blue-500 px-4 py-2">
                            İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($moduller as $modul)
                        <tr>
                            <td class="px-4 py-2 border-b-2 border-black hover:border-blue-500">{{ $modul->id }}</td>
                            <td class="px-4 py-2 border-b-2 border-black hover:border-blue-500">{{ $modul->modul_name }}
                            </td>
                            <td class="px-4 py-2 border-b-2 border-black hover:border-blue-500">{{ $modul->modul_aciklama }}
                            </td>
                            <td class="px-4 py-2 border-b-2 border-black hover:border-blue-500">
                                <img src="{{ asset("adminassets/upload/modul/$modul->modul_resim") }}"
                                    style="width:60px;height:60px;" alt="">
                            </td>
                            <td class="px-4 py-2 border-b-2 border-black hover:border-blue-500">{{ $modul->modul_fiyat }}
                            </td>
                            <td class="border-b-2 border-black hover:border-blue-500">
                                <a href="{{ route('moduls.edit', $modul->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-2 w-100 rounded">
                                    Düzenle
                                </a>
                                <hr>
                                <form action="{{ route('moduls.destroy', $modul->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-2 w-100 rounded">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Başarılı!',
                text: '{{ session('success') }}',
                timer: 2000
            })
        </script>
    @endif
@endsection
