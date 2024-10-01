{{-- @extends('layouts.app')

@section('content')
<div class="container"> --}}
{{-- <x-authuser>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('sentence.reset_password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('sentence.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('sentence.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('sentence.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('sentence.reset_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-authuser> --}}
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
                    {{ __('sentence.reset_password') }}</h5>
                {{-- <p>{{ __('sentence.short_description') }}</p> --}}
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="login_pages_contents_inr_form">
                    <div class="row login_pages_contents_inr_form_row">
                        <div class="col-lg-12 login_pages_contents_inr_form_col">
                            <div class="input_form_holderr bg-transparent border-colour">
                                <h6 style="@if (session()->get('locale') == 'ar') text-align: right !important; @endif">{{ __('sentence.email_address') }}</h6>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    style="@if (session()->get('locale') == 'ar') direction: rtl; @endif" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-12 login_pages_contents_inr_form_col">
                            <div class="input_form_holderr bg-transparent border-colour">
                                <h6 style="@if (session()->get('locale') == 'ar') text-align: right !important; @endif">{{ __('sentence.password') }}</h6>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    style="@if (session()->get('locale') == 'ar') direction: rtl; @endif" name="password" required autocomplete="new-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-lg-12 login_pages_contents_inr_form_col">
                            <div class="input_form_holderr bg-transparent border-colour">
                                <h6 style="@if (session()->get('locale') == 'ar') text-align: right !important; @endif">{{ __('sentence.confirm_password') }}</h6>

                                <input id="password-confirm" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    style="@if (session()->get('locale') == 'ar') direction: rtl; @endif" name="password_confirmation" required autocomplete="new-password" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 mt-2">
                    <div class="col-lg-12 login_pages_contents_inr_form_col">
                        <button type="submit" class="forget-button">
                            {{ __('sentence.reset_password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-authuser>
