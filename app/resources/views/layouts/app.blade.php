<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmet Pickup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/sandwich-icon.png') }}" alt="Icon" width="60" height="60" class="me-2">
                PB CHLEBÍČKY
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Language Switcher -->
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if(app()->getLocale() == 'sk')
                                🇸🇰 SK
                            @else
                                🇺🇸 EN
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary"
                            aria-labelledby="langDropdown">
                            <li><a class="dropdown-item text-white" href="{{ route('lang.switch', 'en') }}">🇺🇸
                                    English</a></li>
                            <li><a class="dropdown-item text-white" href="{{ route('lang.switch', 'sk') }}">🇸🇰
                                    Slovensky</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">{{ __('messages.menu') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.create') }}">{{ __('messages.contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('orders.my') }}">📦 Moje odbery / My Pickups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative @if(session('cart')) text-warning @endif"
                            href="{{ route('cart.index') }}">
                            {{ __('messages.cart') }}
                            @if(session('cart'))
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                    @else
                        @if(Auth::user()->hasPermission('manage_users'))
                            <li class="nav-item">
                                <a class="nav-link text-warning"
                                    href="{{ route('admin.users.index') }}">{{ __('messages.users') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="{{ route('admin.orders.index') }}">Orders</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
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

    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center py-4 text-secondary border-top mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} Gourmet Pickup. {{ __('messages.fresh_local') }}</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>