@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{ __('Vehicle') }}</h4>

                <dl class="row">
                    <dt class="col-sm-3 text-end">{{ __('Model Name') }}</dt>
                    <dd class="col-sm-9">{{ $vehicle->model_name }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Color') }}</dt>
                    <dd class="col-sm-9">{{ $vehicle->color }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Capacity') }}</dt>
                    <dd class="col-sm-9">{{ $vehicle->capacity }}</dd>
                    <dt class="col-sm-3 text-end">{{ __('Air Condition') }}</dt>
                    <dd class="col-sm-9"><i class="bi bi-{{ $vehicle->air_condition ? 'check-circle-fill text-success' : 'x-circle-fill text-danger' }}"></i></dd>
                </dl>
            </div>

            <div class="card-footer">
                <a href="{{ route('company_vehicles.index') }}" class="btn btn-secondary float-end">
                    <i class="bi bi-x-lg"></i> {{ __('Close') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
