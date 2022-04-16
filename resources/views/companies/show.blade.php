@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{ __('Company') }}</h4>

                <dl class="row">
                    <dt class="col-sm-3 text-end">{{ __('Name') }}</dt>
                    <dd class="col-sm-9">{{ $company->name }}</dd>

                    <dt class="col-sm-3 text-end">{{ __('Address') }}</dt>
                    <dd class="col-sm-9">{{ $company->address }}</dd>
                </dl>
            </div>

            <div class="card-footer">
                <a href="{{ route('companies.index') }}" class="btn btn-secondary float-end">
                    <i class="bi bi-x-lg"></i> {{ __('Close') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection