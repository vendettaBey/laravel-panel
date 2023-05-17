@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <table id="musteriTable" class="table striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>#</td>
                        <th>Ad Soyad</th>
                        <th>E-mail</th>
                        <th>Telefon</th>
                        <th>Rol</th>
                        <th>Detay</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($musteriler as $musteri)
                        @php
                            $rol = $musteri->roles;
                            $rol = json_decode($rol);
                            
                            if ($rol->role_id == 2) {
                                $roleName = 'Admin';
                            } elseif ($rol->role_id == 1) {
                                $roleName = 'Kullanıcı';
                            }
                        @endphp
                        <tr>
                            <td>{{ $musteri->id }}</td>
                            <td>{{ $musteri->name }}</td>
                            <td>{{ $musteri->email }}</td>
                            <td>{{ $musteri->telephone }}</td>
                            <td>{{ $roleName }}</td>
                            <td>
                                <a href="/musteriDetay/{{ $musteri->id }}"
                                    class="btn btn-block bg-blue-400 hover:bg-blue-800 text-white">
                                    Detaya Git
                                </a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#musteriTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json"
                }
            });
        });
    </script>
@endsection
