@extends('layouts.app')

@section('content')
<h2>{{ __('Companies Management') }}</h2>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('companies.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> {{ __('Add') }}
                </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th class="actions">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td class="actions">
                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Show') }}">
                                <i class="bi bi-list"></i>
                            </a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form method="POST" action="{{ route('companies.destroy', $company->id) }}" style="display: inline" onsubmit="if (!confirm('{{ __('Are you sure you want to delete this resource?') }}')) { event.returnValue = false; return false;}">
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