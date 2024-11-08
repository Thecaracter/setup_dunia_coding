<aside class="w-64 h-screen bg-white shadow-lg fixed left-0">
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="px-6 py-8 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-primary">Store Admin</h2>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-accent' : 'text-secondary hover:bg-emerald-50 hover:text-accent' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Dashboard</span>
            </a>

            <div class="space-y-1">
                <p class="px-4 pt-6 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Catalog
                </p>

                <a href="{{ route('admin.products') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.products') ? 'bg-emerald-50 text-accent' : 'text-secondary hover:bg-emerald-50 hover:text-accent' }} transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        <path fill-rule="evenodd"
                            d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Products</span>
                </a>

                <a href=""
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-50 text-accent' : 'text-secondary hover:bg-emerald-50 hover:text-accent' }} transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    <span>Categories</span>
                </a>
            </div>

            <div class="space-y-1">
                <p class="px-4 pt-6 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Sales
                </p>

                <a href=""
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.orders.*') ? 'bg-emerald-50 text-accent' : 'text-secondary hover:bg-emerald-50 hover:text-accent' }} transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" />
                    </svg>
                    <span>Orders</span>
                </a>
            </div>

            <div class="space-y-1">
                <p class="px-4 pt-6 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Users
                </p>

                <a href=""
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-emerald-50 text-accent' : 'text-secondary hover:bg-emerald-50 hover:text-accent' }} transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span>Users</span>
                </a>
            </div>
        </nav>
    </div>
</aside>
