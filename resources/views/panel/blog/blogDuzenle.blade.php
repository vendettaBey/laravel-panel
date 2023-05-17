@extends('panel.layout')
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
            <h2 class="text-center font-bold text-2xl mb-5 text-decoration-underline">Blog Düzenleme Yerisi</h2>
            <form action="/blogDuzenleKaydet" id="blogDuzenleForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baslik">Başlık</label>
                            <input type="text" name="baslik" id="baslik" class="form-control"
                                value="{{ $blog->baslik }}">
                            @error('baslik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Kapak Resmi</label>
                            <input type="file" name="blogResim" id="blogResim" value="{{ $blog->image }}"
                                class="form-control">
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
                                    <option @if ($cat->id == $blog->Kategori) {{ __('selected') }} @endif
                                        value="{{ $cat->id }}">{{ $cat->kategoriAdi }}</option>
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
                            <input type="text" name="tags" id="tags" class="form-control"
                                value="{{ $blog->tags }}">
                            @error('tags')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Blog Sırası</label>
                            <input type="number" name="order" id="order" class="form-control"
                                value="{{ $blog->sira }}">
                            @error('order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="icerik">Blog İçeriği</label>
                            <textarea name="icerik" id="editor">
                                {{ $blog->icerik }}
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
@endsection
