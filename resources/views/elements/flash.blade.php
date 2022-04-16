@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill"></i>
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @php
        Session::forget('success');
    @endphp
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @php
        Session::forget('error');
    @endphp
@endif

@if(Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show">
        <i class="bi bi-info-circle-fill"></i>
        {{ Session::get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @php
        Session::forget('info');
    @endphp
@endif
