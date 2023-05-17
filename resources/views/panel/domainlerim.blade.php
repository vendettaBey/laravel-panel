@extends('panel.layout')
@section('content')

    <div class="flex justify-center">
        <table class="w-9/12 table-auto table-borderd table-striped">
          <thead>
            <tr>
                <th class="px-4 py-2">Domain Adı</th>
                <th class="px-4 py-2">Domain Kayıt Tarihi</th>
                <th class="px-4 py-2">Domain Bitiş Tarihi</th>
                <th class="px-4 py-2">Domain Durumu</th>
                <th class="px-4 py-2">Kalan Süre</th>
                <th class="px-4 py-2">
                    İşlem
                </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domains as $domain)
            <tr>
                <td class="border px-4 py-2">{{ $domain->domain_name }}</td>
                <td class="border px-4 py-2">{{ date("d-m-Y",strtotime($domain->start_date)) }}</td>
                <td class="border px-4 py-2">{{ date("d-m-Y",strtotime($domain->end_date)) }}</td>
                <td class="border px-4 py-2">{{ __('active') }}</td>
                <td class="border px-4 py-2">{{ $custom->calculateDateDiff(($domain->end_date),(date("Y-m-d"))) }}</td>
                <td class="border px-4 py-2"><button class="bg-blue-800 text-white py-2 px-4 rounded hover:bg-blue-500 transition duration-300">Uzat / Yenile</button></td>
            </tr>
        @endforeach   
          </tbody>
        </table>
      </div>
      
    
    
@endsection