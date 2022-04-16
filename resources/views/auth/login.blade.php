@extends('layouts.login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body px-4">
                <h4 class="mb-3">{{ __('Login to your account') }}</h4>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-2">
                        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mt-3 clearfix">
                        <div class="form-check my-2 float-start">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>

                <hr>
                @if (Route::has('password.request'))
                <div class="mb-2">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="mb-2">
                    <a href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
