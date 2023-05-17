@extends('panel.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        <h1>My Profile</h1>

                        <div>
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <div>
                            @include('profile.partials.update-password-form')
                        </div>

                        <div>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection