@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{ __('Shuttle') }}</h4>

                <dl class="row">
                    <dt class="col-sm-3 text-end">{{ __('Vehicle') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->vehicle->model_name }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Departure City') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->departure_city->name }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Arrival City') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->arrival_city->name }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Time Of Departure') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->departure_time }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Time Of Arrival') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->arrival_time }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Price') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->price }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Passenger Count') }}</dt>
                    <dd class="col-sm-9">{{ $shuttle->passenger_count }}</dd>
                </dl>
            </div>

            <div class="card-footer">
                <a href="{{ route('company_shuttles.index') }}" class="btn btn-secondary float-end">
                    <i class="bi bi-x-lg"></i> {{ __('Close') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
