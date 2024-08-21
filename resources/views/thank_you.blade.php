<x-user>
    <style>
        .btn_invoice {
            color: var(--default-color) !important;
            border: 2px solid var(--accent-color) !important;
            background: transparent !important;
            transition: 0.4s !important;
        }
        .btn_invoice:hover {
            background: var(--accent-color) !important;
            color: #fff !important;
        }
    </style>
    <div class="vh-100 d-flex justify-content-center align-items-center ">
        <div class="col-md-8 " style="border-top: 5px solid transparent;">
            <div class="card  bg-white shadow p-5 bg-transparent" style="border-radius: 0px">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color: var(--accent-color) !important;" width="75"
                        height="75" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>{{ __('sentence.thankyou') }}!</h1>
                    <p class="text-colour">{{ __('sentence.thankyoumessage') }}</p>
                    @if (Auth::check())
                        <a class="btn btn_invoice "
                            href="{{ route('user.dashboard') }}">{{ __('sentence.dashboard') }}</a>
                    @else
                        <a class="btn btn_invoice " href="{{ route('login') }}">{{ __('sentence.login') }}</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-user>
