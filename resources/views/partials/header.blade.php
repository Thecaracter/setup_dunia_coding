<header class="bg-white shadow-sm">
    <div class="px-8 py-4 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-primary">@yield('header_title', 'Dashboard')</h1>
            <p class="text-secondary">@yield('header_subtitle', 'Welcome back, Admin!')</p>
        </div>

        <div class="flex items-center space-x-6">
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                    <div class="text-left">
                        <h3 class="text-sm font-medium text-primary">John Doe</h3>
                        <p class="text-xs text-secondary">Administrator</p>
                    </div>
                    <!-- Dropdown Arrow -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2" style="display: none;">
                    <hr class="my-2">
                    <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-50">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
