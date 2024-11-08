<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Store Admin</title>
    @vite('resources/css/app.css')
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            min-height: 100vh;
            background: #f5f6fa;
        }

        .layout-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        .content-wrapper {
            flex: 1;
            min-width: 0;
            transition: margin-left 0.3s ease;
        }

        @media (min-width: 992px) {
            .content-wrapper {
                margin-left: 16rem;
            }

            .content-wrapper.sidebar-collapsed {
                margin-left: 4.5rem;
            }
        }

        @media (max-width: 991.98px) {
            .content-wrapper {
                margin-left: 0;
            }
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <div class="layout-container">
        @include('partials.sidebar')

        <div class="content-wrapper" id="contentWrapper">
            @include('partials.header')

            <main class="p-4">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
