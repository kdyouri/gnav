@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('company_shuttles.update', $shuttle->id) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">{{ __('Edit :resource', ['resource' => __('Shuttle')]) }}</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                {{ __('The :resource could not be saved! Please try again.', ['resource' => __('Shuttle')]) }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Vehicle : -->
                        <div class="mb-2">
                            <label for="vehicle_id" class="col-form-label">{{ __('Vehicle') }}</label>
                            <select id="vehicle_id" class="form-select @error('vehicle_id') is-invalid @enderror" name="vehicle_id" required autocomplete="off">
                                <option value=""></option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}"{{ old('vehicle_id', $shuttle->vehicle_id) == $vehicle->id ? ' selected' : '' }}>
                                    {{ $vehicle->model_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle_id')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Departure City : -->
                                <div class="mb-2">
                                    <label for="departure_city_id" class="col-form-label">{{ __('Departure City') }}</label>
                                    <select id="departure_city_id" class="form-select @error('departure_city_id') is-invalid @enderror" name="departure_city_id" required autocomplete="off">
                                        <option value=""></option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"{{ old('departure_city_id', $shuttle->departure_city_id) == $city->id ? ' selected' : '' }}>
                                            {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departure_city_id')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <!-- Departure Time -->
                                <div class="mb-2">
                                    <label for="departure_time" class="col-form-label">{{ __('Time Of Departure') }}</label>
                                    <input id="departure_time" type="text" class="form-control @error('departure_time') is-invalid @enderror" name="departure_time" value="{{ old('departure_time', $shuttle->departure_time) }}" required autocomplete="off">
                                    @error('departure_time')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Arrival City : -->
                                <div class="mb-2">
                                    <label for="arrival_city_id" class="col-form-label">{{ __('Arrival City') }}</label>
                                    <select id="arrival_city_id" class="form-select @error('arrival_city_id') is-invalid @enderror" name="arrival_city_id" required autocomplete="off">
                                        <option value=""></option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"{{ old('arrival_city_id', $shuttle->arrival_city_id) == $city->id ? ' selected' : '' }}>
                                            {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('arrival_city_id')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <!-- Arrival Time -->
                                <div class="mb-2">
                                    <label for="arrival_time" class="col-form-label">{{ __('Time Of Arrival') }}</label>
                                    <input id="arrival_time" type="text" class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time" value="{{ old('arrival_time', $shuttle->arrival_time) }}" required autocomplete="off">
                                    @error('arrival_time')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Price -->
                                <div class="mb-2">
                                    <label for="price" class="col-form-label">{{ __('Price') }}</label>
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $shuttle->price) }}" required autocomplete="off">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <!-- Passenger Count -->
                                <div class="mb-2">
                                    <label for="passenger_count" class="col-form-label">{{ __('Passenger Count') }}</label>
                                    <input id="passenger_count" type="number" class="form-control @error('passenger_count') is-invalid @enderror" name="passenger_count" value="{{ old('passenger_count', $shuttle->passenger_count) }}" required autocomplete="off">
                                    @error('passenger_count')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-start">
                            <i class="bi bi-save"></i> {{ __('Save') }}
                        </button>
                        <a href="{{ route('company_shuttles.index') }}" class="btn btn-secondary float-end">
                            <i class="bi bi-x-lg"></i> {{ __('Cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
