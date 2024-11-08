@extends('layouts.layout-admin')

@section('title', 'Dashboard')

@section('header_title', 'Dashboard Overview')
@section('header_subtitle', 'Monitor your store performance')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <!-- Total Sales Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-emerald-50 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium">Total Sales</h3>
                </div>
                <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-sm font-medium">+12.5%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-gray-900">Rp 45.6M</p>
                <span class="ml-2 text-sm text-gray-500">this month</span>
            </div>
            <div class="mt-4">
                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full transition-all duration-500" style="width: 75%"></div>
                </div>
                <p class="mt-2 text-sm text-gray-500">75% of monthly target</p>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium">Total Orders</h3>
                </div>
                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">+8.2%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-gray-900">2,450</p>
                <span class="ml-2 text-sm text-gray-500">orders</span>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-4">
                <div class="text-center p-2 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500">Pending</p>
                    <p class="font-semibold text-gray-900">45</p>
                </div>
                <div class="text-center p-2 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500">Processing</p>
                    <p class="font-semibold text-gray-900">124</p>
                </div>
                <div class="text-center p-2 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500">Completed</p>
                    <p class="font-semibold text-gray-900">2,281</p>
                </div>
            </div>
        </div>

        <!-- Products Stats Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-purple-50 rounded-lg">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium">Products</h3>
                </div>
                <span class="bg-purple-50 text-purple-600 px-3 py-1 rounded-full text-sm font-medium">+23</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-gray-900">156</p>
                <span class="ml-2 text-sm text-gray-500">total items</span>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="text-center p-2 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500">In Stock</p>
                    <p class="font-semibold text-gray-900">142</p>
                </div>
                <div class="text-center p-2 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500">Low Stock</p>
                    <p class="font-semibold text-red-500">14</p>
                </div>
            </div>
        </div>

        <!-- Customer Stats Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-amber-50 rounded-lg">
                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium">Customers</h3>
                </div>
                <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-sm font-medium">+4.8%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-gray-900">1,245</p>
                <span class="ml-2 text-sm text-gray-500">registered</span>
            </div>
            <div class="mt-4">
                <div class="p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Active this month</span>
                        <span class="text-sm font-semibold text-gray-900">856</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
        <!-- Sales Chart -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Sales Overview</h3>
                <select class="px-4 py-2 bg-gray-50 border-0 rounded-lg text-gray-600 focus:ring-2 focus:ring-emerald-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>This Year</option>
                </select>
            </div>
            <div class="h-80">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Top Products</h3>
                <select class="px-4 py-2 bg-gray-50 border-0 rounded-lg text-gray-600 focus:ring-2 focus:ring-emerald-500">
                    <option>By Revenue</option>
                    <option>By Quantity</option>
                </select>
            </div>
            <div class="space-y-4">
                <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/50" alt="Product"
                            class="w-12 h-12 rounded-lg object-cover">
                        <div class="ml-4 flex-1">
                            <h4 class="text-gray-900 font-medium">iPhone 15 Pro Max</h4>
                            <p class="text-sm text-gray-500">124 sold</p>
                        </div>
                        <p class="font-semibold text-gray-900">Rp 21.999.000</p>
                    </div>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/50" alt="Product"
                            class="w-12 h-12 rounded-lg object-cover">
                        <div class="ml-4 flex-1">
                            <h4 class="text-gray-900 font-medium">MacBook Pro 16"</h4>
                            <p class="text-sm text-gray-500">98 sold</p>
                        </div>
                        <p class="font-semibold text-gray-900">Rp 24.999.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Recent Orders</h2>

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Order ID</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Customer</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Products</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Total</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Status</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Date</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-500">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900">#ORD-001</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/30" alt="Avatar"
                                    class="w-8 h-8 rounded-full border-2 border-white shadow-sm">
                                <span class="ml-3 text-sm text-gray-900">John Doe</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">iPhone 15 Pro Max</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">Rp 21.999.000</td>
                        <td class="px-6 py-4">
                            <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-sm font-medium">
                                Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">2024-11-09</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                View Details
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Sales',
                        data: [12000000, 19000000, 15000000, 25000000, 22000000, 30000000,
                            28000000
                        ],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#10B981',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                borderDash: [5, 5],
                                drawBorder: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000) + 'M';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
