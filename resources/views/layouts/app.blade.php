<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('common/head')

<body>
    <div id="app">

        @include('common/header')

        <main class="py-4" id="main-content">
            @yield('content')
		</main>

		@include('common/footer')
    </div>
</body>
</html>
