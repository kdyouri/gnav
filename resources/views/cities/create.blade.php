@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('cities.store') }}" novalidate>
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">{{ __('New City') }}</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ __('The :resource could not be saved! Please try again.', ['resource' => __('City')]) }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="mb-2">
                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-start">
                        <i class="bi bi-save"></i> {{ __('Save') }}
                    </button>
                    <a href="{{ route('cities.index') }}" class="btn btn-secondary float-end">
                        <i class="bi bi-x-lg"></i> {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
