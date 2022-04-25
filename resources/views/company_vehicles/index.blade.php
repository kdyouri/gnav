@extends('layouts.app')

@section('content')
<h2>{{ __('Vehicles Management') }}</h2>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('company_vehicles.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> {{ __('Add') }}
                </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Model Name') }}</th>
                        <th>{{ __('Color') }}</th>
                        <th>{{ __('Capacity') }}</th>
                        <th>{{ __('Air Condition') }}</th>
                        <th class="actions">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->model_name }}</td>
                        <td>{{ $vehicle->color }}</td>
                        <td>{{ $vehicle->capacity }}</td>
                        <td>
                            <i class="bi bi-{{ $vehicle->air_condition ? 'check-circle-fill text-success' : 'x-circle-fill text-danger' }}"></i>
                        </td>
                        <td class="actions">
                            <a href="{{ route('company_vehicles.show', $vehicle->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Show') }}">
                                <i class="bi bi-list"></i>
                            </a>
                            <a href="{{ route('company_vehicles.edit', $vehicle->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form method="POST" action="{{ route('company_vehicles.destroy', $vehicle->id) }}" style="display: inline" onsubmit="if (!confirm('{{ __('Are you sure you want to delete this resource?') }}')) { event.returnValue = false; return false;}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
