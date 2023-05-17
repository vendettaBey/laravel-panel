@extends('panel.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active w-50" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Aboneler</button>
                    <button class="nav-link w-50" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Formlar</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Abone</th>
                                            <th>Kayıt Tarihi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aboneler as $abone)
                                            <tr>
                                                <td>{{ $abone->email }}</td>
                                                <td>{{ $abone->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                    tabindex="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ad Soyad</th>
                                            <th>Email Adresi</th>
                                            <th>Telefon</th>
                                            <th>Firma/Kurum Adı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forms as $form)
                                            <tr>
                                                <td>{{ $form->id }}</td>
                                                <td>{{ $form->name }}</td>
                                                <td>{{ $form->email }}</td>
                                                <td>{{ $form->telephone }}</td>
                                                <td>{{ $form->company }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
