@extends('layouts.login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{ __('Register') }}</h4>

                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <div class="container">
                        @php
                            $is_passenger = old('role', 'passenger') == 'passenger';
                            $is_company = old('role', 'passenger') == 'company';
                        @endphp
                        <div class="row">
                            <div class="form-check col">
                                <input class="form-check-input" type="radio" name="role" value="passenger" id="role_passenger"{{ $is_passenger ? ' checked' : '' }}>
                                <label class="form-check-label" for="role_passenger">{{ __('Passenger') }}</label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="radio" name="role" value="company" id="role_company"{{ $is_company ? ' checked' : '' }}>
                                <label class="form-check-label" for="role_company">{{ __('Transport Company') }}</label>
                            </div>
                        </div>
                    </div>

                    <div id="passenger_form"{{ !$is_passenger ? ' style=display:none' : '' }}>
                        <div class="mb-2">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus{{ !$is_passenger ? ' disabled' : '' }}>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="phone_number" class="col-form-label">{{ __('Phone Number') }}</label>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="off"{{ !$is_passenger ? ' disabled' : '' }}>
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="company_form"{{ !$is_company ? ' style=display:none' : '' }}>
                        <div class="mb-2">
                            <label for="name" class="col-form-label">{{ __('Company Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus{{ !$is_company ? ' disabled' : '' }}>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password_confirmation" class="col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                    </div>

                    <div class="my-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                @if (Route::has('login'))
                    <hr>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '[name=role]', function(){
        if ($(this).val() === 'company') {
            $('#passenger_form').hide().find(':input').attr('disabled', true);
            $('#company_form').show().find(':input').attr('disabled', false);
        }
        if ($(this).val() === 'passenger') {
            $('#company_form').hide().find(':input').attr('disabled', true);
            $('#passenger_form').show().find(':input').attr('disabled', false);
        }
    });
</script>
@endsection
