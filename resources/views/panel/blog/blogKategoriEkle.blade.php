@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-2xl font-bold text-center">Kategori Ekle</h2>
            <form action="/blogKategoriKaydet" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="baslik">Kategori Adı</label>
                            <input type="text" name="baslik" id="baslik" class="form-control"
                                placeholder="Kategori Adı Giriniz">
                            @error('baslik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="baslik">Kategori Sıra</label>
                            <input type="text" name="sira" id="sira" class="form-control"
                                placeholder="Kategori Sıra Giriniz">
                            @error('sira')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="baslik">Menüde Göster/Gösterme</label>
                            <select name="menu" id="menu" class="form-control">
                                <option selected value="1">Göster</option>
                                <option value="0">Gösterme</option>
                            </select>
                            @error('menu')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="baslik">SEO Başlık</label>
                            <input type="text" name="seoBaslik" id="seoBaslik" class="form-control"
                                placeholder="Kategori seoBaslik">
                            @error('seoBaslik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="baslik">SEO Açıklama</label>
                            <input type="text" name="seoAciklama" id="seoAciklama" class="form-control"
                                placeholder="Kategori seoAciklama">
                            @error('seoAciklama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 my-5">
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-block bg-green-600 hover:bg-green-400 hover:text-2xl text-white">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Başlık</td>
                        <td>İşlem</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogKategoriler as $blogKat)
                        <tr>
                            <td>{{ $blogKat->id }}</td>
                            <td>{{ $blogKat->kategoriAdi }}</td>
                            <td>
                                <button class="btn btn-danger">Sil</button>
                                <button class="btn btn-info">Düzenle</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @if (session('successKategori'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Kategori Eklendi',
                text: 'Kategori Ekleme İşlemi Başarılı',
                confirmButtonText: 'Tamam'
            })
        </script>
    @endif
@endsection
