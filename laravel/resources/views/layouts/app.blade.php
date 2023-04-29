<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div>
        <div class='xl:mx-16 flex justify-between mb-16 items-center'>
            <a href="{{ route('home') }}">
                <span class="text-6xl pl-4">rBit</span>
                @if (Auth::check())
                    {{ Auth::user()->name }}
                @endif
            </a>
            <nav class="px-8 flex">
                <ul class='flex space-x-4'>
                    <li><a href=''>Home</a></li>
                    @guest
                        <li><a href='{{ route('login') }}'>Log in</a></li>
                    @else
                        <li>
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>

        <main class="py-4 w-3/4 mx-auto">
            @if (Session::has('success'))
                <x-success class='mb-8'>{{ Session::get('success') }}</x-successclass>
            @endif
            @if (Session::has('error'))
                <x-error class='mb-8'>{{ Session::get('error') }}</x-error>
            @endif

            @yield('content')
        </main>
    </div>
    @yield('scripts')

</body>

</html>
