@extends('panel.layout')
@section('css')
    <style>
        .gizle-goster {
            display: inline;
        }

        .goster {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-2xl font-bold text-center">Bloglar</h2>
        </div>
        <div class="col-md-3 offset-md-9">
            <a href="{{ route('blogEkle') }}" class="btn btn-block bg-green-500 hover:bg-green-800 text-white hover:text-2xl">
                Yeni Blog Ekle
            </a>
        </div>
        @foreach ($bloglar as $blog)
            <div class="col-md-4 my-5">
                @php
                    $icerik = strip_tags($blog->icerik);
                    $icerik = trim($icerik);
                    $icerik = htmlspecialchars($icerik);
                @endphp
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset("adminassets/upload/blog/$blog->image") }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-dark text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $blog->baslik }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {!! $custom->kisaltVeGizle($icerik) !!}
                        </p>
                        <a href="{{ route('blogSil', $blog->id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Sil
                            <i class="mx-2 fas fa-trash"></i>
                        </a>
                        <a href="{{ route('blogDuzenleForm', $blog->id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Düzenle
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        function gizleGoster(button) {
            var parent = button.parentNode;
            var gizleGosterElement = parent.querySelector('.gizle-goster');
            var gosterElement = parent.querySelector('.goster');

            if (gizleGosterElement.style.display === 'none') {
                gizleGosterElement.style.display = 'inline';
                gosterElement.style.display = 'none';
                button.innerHTML = 'Devamı';
            } else {
                gizleGosterElement.style.display = 'none';
                gosterElement.style.display = 'inline';
                button.innerHTML = 'Gizle';
            }
        }
    </script>

    @if (session('successBlog'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Blog Eklendi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('successBlogUpdate'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Blog Güncellendi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('successBlogDelete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Blog Silindi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
