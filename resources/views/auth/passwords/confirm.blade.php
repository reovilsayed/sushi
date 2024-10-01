{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('sentence.confirm_password') }}</div>

                    <div class="card-body">{{ __('sentence.please_confirm_your_password_before_continuing') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('sentence.password') }}{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('sentence.confirm_password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('sentence.forgot_your_password') }} {{ __('?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<x-authuser>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login_pages_contents_inr col-md-6 text-center bg-transparent border-colour">
            <a href="{{ route('dashboard') }}" class="main_img">
                <img src="{{ Settings::setting('site.logo') ? Storage::url(Settings::setting('site.logo')) : asset('images/logo.png') }}"
                    alt="" width="200">
            </a>
            <div class="login_pages_contents_hdngg"
                style="@if (session()->get('locale') == 'ar') direction: rtl; text-align: right; @endif">
                <h5 class="text-start text-colour"
                    style=" color: var(--accent-color); @if (session()->get('locale') == 'ar') direction: rtl; text-align: right !important; @endif">
                    {{ __('sentence.confirm_password') }}</h5>
                <p>{{ __('sentence.please_confirm_your_password_before_continuing') }}</p>
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="login_pages_contents_inr_form">
                    <div class="row login_pages_contents_inr_form_row">
                        <div class="col-lg-12 login_pages_contents_inr_form_col">
                            <div class="input_form_holderr bg-transparent border-colour">
                                <h6 style="@if (session()->get('locale') == 'ar') text-align: right !important; @endif">
                                    {{ __('sentence.password') }}</h6>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    style="@if (session()->get('locale') == 'ar') direction: rtl; @endif" name="password"
                                    required autocomplete="current-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 mt-2">
                    <div class="col-lg-12 login_pages_contents_inr_form_col">
                        <button type="submit" class="forget-button">
                            {{ __('sentence.confirm_password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link mt-3" href="{{ route('password.request') }}">
                                {{ __('sentence.forgot_your_password') }} {{ __('?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-authuser>
