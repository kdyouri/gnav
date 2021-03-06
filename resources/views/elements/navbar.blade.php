<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/logo.png" alt="Logo" height="32">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link{{ Request::path() == '/' ? ' active' : '' }}">
                        <i class="bi bi-house"></i> {{ __('Home') }}
                    </a>
                </li>
            @if (Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a href="/companies" class="nav-link{{ preg_match('/^companies/', Request::path()) ? ' active' : '' }}">
                        <i class="bi bi-building"></i> {{ __('Companies') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/cities" class="nav-link{{ preg_match('/^cities/', Request::path()) ? ' active' : '' }}">
                        <i class="bi bi-geo-alt"></i> {{ __('Cities') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/vehicles" class="nav-link{{ preg_match('/^vehicles/', Request::path()) ? ' active' : '' }}">
                        <i class="bi bi-truck"></i> {{ __('Vehicles') }}
                    </a>
                </li>
            @elseif (Auth::user()->role === 'company')
                <li class="nav-item">
                    <a href="/company_shuttles" class="nav-link{{ preg_match('/^company_shuttles/', Request::path()) ? ' active' : '' }}">
                        <i class="bi bi-signpost"></i> {{ __('Our Shuttles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/company_vehicles" class="nav-link{{ preg_match('/^company_vehicles/', Request::path()) ? ' active' : '' }}">
                        <i class="bi bi-truck"></i> {{ __('Our Vehicles') }}
                    </a>
                </li>
            @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
