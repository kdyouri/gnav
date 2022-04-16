@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">{{ __('Edit :resource', ['resource' => __('Vehicle')]) }}</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                {{ __('The :resource could not be saved! Please try again.', ['resource' => __('Vehicle')]) }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="mb-2">
                            <label for="model_name" class="col-form-label">{{ __('Model Name') }}</label>
                            <input id="model_name" type="text" class="form-control @error('model_name') is-invalid @enderror" name="model_name" value="{{ old('model_name', $vehicle->model_name) }}" required autocomplete="off" autofocus>
                            @error('model_name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="color" class="col-form-label">{{ __('Color') }}</label>
                            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color', $vehicle->color) }}" required autocomplete="off">
                            @error('color')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="capacity" class="col-form-label">{{ __('Capacity') }}</label>
                            <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity', $vehicle->capacity) }}" required autocomplete="off">
                            @error('capacity')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2 my-4 form-check">
                            <input id="air_condition" type="checkbox" class="form-check-input @error('air_condition') is-invalid @enderror" name="air_condition" value="1"{{ old('air_condition', $vehicle->air_condition) ? ' checked' : '' }}>
                            <label for="air_condition" class="form-check-label">{{ __('Air Condition') }}</label>
                            @error('air_condition')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="company_id" class="col-form-label">{{ __('Company') }}</label>
                            <select id="company_id" class="form-select @error('company_id') is-invalid @enderror" name="company_id" required autocomplete="off">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}"{{ old('company_id', $vehicle->company_id) == $company->id ? ' selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                            </select>
                            @error('company_id')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-start">
                            <i class="bi bi-save"></i> {{ __('Save') }}
                        </button>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary float-end">
                            <i class="bi bi-x-lg"></i> {{ __('Cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection