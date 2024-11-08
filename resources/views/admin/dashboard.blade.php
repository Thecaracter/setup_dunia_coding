@extends('layouts.layout-admin')

@section('title', 'Dashboard')

@section('header_title', 'Dashboard Overview')
@section('header_subtitle', 'Monitor your store performance')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Sales Card -->
        <div class="bg-card rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-secondary">Total Sales</h3>
                <span class="bg-emerald-100 text-accent px-3 py-1 rounded-lg text-sm">+12.5%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-primary">Rp 45.6M</p>
                <span class="ml-2 text-sm text-secondary">this month</span>
            </div>
            <div class="mt-4">
                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 75%"></div>
                </div>
                <p class="mt-2 text-sm text-secondary">75% of monthly target</p>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="bg-card rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-secondary">Total Orders</h3>
                <span class="bg-emerald-100 text-accent px-3 py-1 rounded-lg text-sm">+8.2%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-primary">2,450</p>
                <span class="ml-2 text-sm text-secondary">orders</span>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-2">
                <div>
                    <p class="text-sm text-secondary">Pending</p>
                    <p class="font-semibold text-primary">45</p>
                </div>
                <div>
                    <p class="text-sm text-secondary">Processing</p>
                    <p class="font-semibold text-primary">124</p>
                </div>
                <div>
                    <p class="text-sm text-secondary">Completed</p>
                    <p class="font-semibold text-primary">2,281</p>
                </div>
            </div>
        </div>

        <!-- Products Stats Card -->
        <div class="bg-card rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-secondary">Products</h3>
                <span class="bg-emerald-100 text-accent px-3 py-1 rounded-lg text-sm">+23</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-primary">156</p>
                <span class="ml-2 text-sm text-secondary">total items</span>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-2">
                <div>
                    <p class="text-sm text-secondary">In Stock</p>
                    <p class="font-semibold text-primary">142</p>
                </div>
                <div>
                    <p class="text-sm text-secondary">Low Stock</p>
                    <p class="font-semibold text-red-500">14</p>
                </div>
            </div>
        </div>

        <!-- Customer Stats Card -->
        <div class="bg-card rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-secondary">Customers</h3>
                <span class="bg-emerald-100 text-accent px-3 py-1 rounded-lg text-sm">+4.8%</span>
            </div>
            <div class="flex items-baseline">
                <p class="text-3xl font-bold text-primary">1,245</p>
                <span class="ml-2 text-sm text-secondary">registered</span>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm">
                    <span class="text-secondary">Active this month:</span>
                    <span class="ml-2 font-semibold text-primary">856</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sales Chart -->
        <div class="bg-card rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-primary">Sales Overview</h3>
                <select
                    class="px-3 py-1 border border-gray-200 rounded-lg text-secondary focus:outline-none focus:border-emerald-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>This Year</option>
                </select>
            </div>
            <div class="h-80">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Top Products Chart -->
        <div class="bg-card rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-primary">Top Products</h3>
                <select
                    class="px-3 py-1 border border-gray-200 rounded-lg text-secondary focus:outline-none focus:border-emerald-500">
                    <option>By Revenue</option>
                    <option>By Quantity</option>
                </select>
            </div>
            <div class="space-y-4">
                <!-- Product Item -->
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/50" alt="Product" class="w-12 h-12 rounded-lg object-cover">
                    <div class="ml-4 flex-1">
                        <h4 class="text-primary font-medium">iPhone 15 Pro Max</h4>
                        <p class="text-sm text-secondary">124 sold</p>
                    </div>
                    <p class="font-semibold text-primary">Rp 21.999.000</p>
                </div>
                <!-- More Product Items -->
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/50" alt="Product" class="w-12 h-12 rounded-lg object-cover">
                    <div class="ml-4 flex-1">
                        <h4 class="text-primary font-medium">MacBook Pro 16"</h4>
                        <p class="text-sm text-secondary">98 sold</p>
                    </div>
                    <p class="font-semibold text-primary">Rp 24.999.000</p>
                </div>
                <!-- Add more products here -->
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-card rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-primary">Recent Orders</h2>
                <a href="#" class="text-accent hover:text-emerald-700">View All</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-secondary bg-gray-50">
                        <th class="text-left px-6 py-4 font-medium">Order ID</th>
                        <th class="text-left px-6 py-4 font-medium">Customer</th>
                        <th class="text-left px-6 py-4 font-medium">Products</th>
                        <th class="text-left px-6 py-4 font-medium">Total</th>
                        <th class="text-left px-6 py-4 font-medium">Status</th>
                        <th class="text-left px-6 py-4 font-medium">Date</th>
                        <th class="text-right px-6 py-4 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-primary">#ORD-001</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/30" alt="Avatar" class="w-8 h-8 rounded-full">
                                <span class="ml-3 text-primary">John Doe</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-secondary">iPhone 15 Pro Max</td>
                        <td class="px-6 py-4 font-medium text-primary">Rp 21.999.000</td>
                        <td class="px-6 py-4">
                            <span class="bg-emerald-100 text-accent px-3 py-1 rounded-lg text-sm">Completed</span>
                        </td>
                        <td class="px-6 py-4 text-secondary">2024-11-09</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-accent hover:text-emerald-700">View Details</button>
                        </td>
                    </tr>
                    <!-- You can add more rows here -->
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
                        tension: 0.4,
                        fill: false
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
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000) + 'M';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
