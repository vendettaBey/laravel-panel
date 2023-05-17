@extends('panel.layout')
@section('title', 'Blog Ekle')
@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center font-bold text-2xl mb-5 text-decoration-underline">Blog Ekleme Yerisi</h2>
            <form action="/blogKaydet" id="blogEkleForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baslik">Başlık</label>
                            <input type="text" name="baslik" id="baslik" class="form-control"
                                placeholder="Başlık Giriniz">
                            @error('baslik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Kapak Resmi</label>
                            <input type="file" name="blogResim" id="blogResim" class="form-control">
                            @error('blogResim')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category">Blog Kategorisi</label>
                            <select name="category" id="category" class="form-control text-dark">
                                @foreach ($blogKategorileri as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->kategoriAdi }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Blog Tagi</label>
                            <input type="text" name="tags" id="tags" class="form-control" placeholder="Tagler">
                            @error('tags')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Blog Sırası</label>
                            <input type="number" name="order" id="order" class="form-control" placeholder="Sıra">
                            @error('order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="icerik">Blog İçeriği</label>
                            <textarea name="icerik" id="editor">
                                &lt;p&gt;This is some sample content.&lt;/p&gt;
                            </textarea>
                            @error('icerik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Blog Ekle</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });


        });
    </script>
    @if (session('successBlog'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Blog Eklendi',
                text: 'Blog Ekleme İşlemi Başarılı',
                confirmButtonText: 'Tamam'
            })
        </script>
    @endif
@endsection
