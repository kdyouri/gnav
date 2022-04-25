@extends('layouts.app')

@section('content')
<h2>{{ __('Shuttles Management') }}</h2>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('company_shuttles.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> {{ __('Add') }}
                </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Vehicle') }}</th>
                        <th>{{ __('Departure City') }}</th>
                        <th>{{ __('Arrival City') }}</th>
                        <th>{{ __('Time Of Departure') }}</th>
                        <th>{{ __('Time Of Arrival') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Passenger Count') }}</th>
                        <th class="actions">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($shuttles as $shuttle)
                    <tr>
                        <td>{{ $shuttle->vehicle->model_name }}</td>
                        <td>{{ $shuttle->departure_city->name }}</td>
                        <td>{{ $shuttle->arrival_city->name }}</td>
                        <td>{{ $shuttle->departure_time }}</td>
                        <td>{{ $shuttle->arrival_time }}</td>
                        <td>{{ $shuttle->price }}</td>
                        <td>{{ $shuttle->passenger_count }}</td>
                        <td class="actions">
                            <a href="{{ route('company_shuttles.show', $shuttle->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Show') }}">
                                <i class="bi bi-list"></i>
                            </a>
                            <a href="{{ route('company_shuttles.edit', $shuttle->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form method="POST" action="{{ route('company_shuttles.destroy', $shuttle->id) }}" style="display: inline" onsubmit="if (!confirm('{{ __('Are you sure you want to delete this resource?') }}')) { event.returnValue = false; return false;}">
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
