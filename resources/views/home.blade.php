@extends('layouts.app')

@section('content')
    <h3>{{ __('Available Shuttles') }}</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="list-group">
                    @foreach ($shuttles as $shuttle)
                    <div class="list-group-item">

                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $shuttle->departure_city->name }} - {{ $shuttle->arrival_city->name }}</h5>
                            @if (Auth::user()->role === 'passenger')
                            <a href="{{ route('memberships.create') }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-box-arrow-in-left"></i> {{ __('Subscribe') }}
                            </a>
                            @endif
                        </div>
                        <p class="mb-1">
                            <small>{{ $shuttle->departure_time }} - {{ $shuttle->arrival_time }}</small>
                        </p>
                        <p class="mb-1">
                            <strong>{{ __('Company') }}</strong> {{ $shuttle->vehicle->company->name }}<br>
                            <strong>{{ __('Vehicle') }}</strong> {{ $shuttle->vehicle->model_name }} - {{ $shuttle->vehicle->color }} ({{ __('Air Condition') }} : <i class="bi bi-{{ $shuttle->vehicle->air_condition ? 'check-circle-fill text-success' : 'x-circle-fill text-danger' }}"></i> {{ $shuttle->vehicle->air_condition ? __('Yes') : __('No') }})<br>
                            <strong>{{ __('Passenger Count') }}</strong> {{ $shuttle->passenger_count }}<br>
                            <strong>{{ __('Price') }}</strong> {{ $shuttle->price }}dh<br>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
