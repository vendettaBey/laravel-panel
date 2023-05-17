@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2 class="text-xl font-bold text-center">Kod Ekleme Yerisi</h2>
            <form action="/kodKaydet" method="POST">
                @csrf
                <div class="form-group">
                    <label class="w-full" for="header">Header Kod</label>
                    <textarea class="form-control" name="header" id="header" cols="30" rows="5">
                        {!! trim($kod->header) !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="footer" class="w-full">Footer Kod</label>
                    <textarea class="form-control" name="footer" id="footer" cols="30" rows="5">
                        {!! trim($kod->footer) !!}
                    </textarea>
                </div>
                <input type="hidden" name="addedBy" value="{{ Auth::user()->id }}">
                <button class="btn btn-block bg-blue-400 hover:bg-blue-800 text-white" type="submit">Kaydet</button>
            </form>
        </div>
        <div class="col-md-8">
            <h2 class="text-xl font-bold text-center">Kodlar</h2>
            <table class="table striped table-bordered table-responsive">

                <tbody>

                    <tr>
                        <th>Header</th>
                        <td colspan="2">{{ $kod->header }}</td>
                    </tr>
                    <tr>
                        <th>Footer</th>
                        <td colspan="2">{{ $kod->footer }}</td>
                    </tr>
                    <tr>
                        <th>Ekleyen</th>
                        <td>{{ $kod->addedBy }}</td>
                    </tr>
                    <tr>
                        <th>Sil</th>
                        <td>
                        <td>
                            <a href="{{ route('kodSil', $kod->id) }}"
                                class="btn btn-block bg-red-700 hover:bg-red-500 text-white">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>



    </div>

    @if (session('successCode'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Başarılı',
                text: '{{ session('successCode') }}'
            })
        </script>
        @php
            session()->forget('successCode');
        @endphp
    @endif
    @if (session('deleteCode'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Başarılı',
                text: '{{ session('deleteCode') }}'
            })
        </script>
        @php
            session()->forget('deleteCode');
        @endphp
    @endif
@endsection
