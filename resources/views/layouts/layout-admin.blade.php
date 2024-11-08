<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Store Admin</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="bg-gradient-custom min-h-screen">
    <div class="flex min-h-screen">
        @include('partials.sidebar')

        <div class="flex-1 ml-64">
            @include('partials.header')

            <main class="p-8 mb-auto">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
    </div>

    @stack('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
