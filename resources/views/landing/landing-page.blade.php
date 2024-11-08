@extends('layouts.layouts-landing')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div id="hero-section" class="relative overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 lg:w-full">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Welcome to Our</span>
                            <span class="block text-emerald-600">Online Store</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                            Discover our amazing products at great prices. Quality products for every need.
                        </p>
                        <div class="mt-5 sm:mt-8 flex justify-center">
                            <div class="rounded-md shadow">
                                <a href="#featured-products"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 md:py-4 md:text-lg md:px-10">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div id="featured-products" class="products-section bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Featured Products</h2>
                <select
                    class="px-4 py-2 rounded-lg border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
                    <option>All Products</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest</option>
                </select>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Product Card 1 -->
                <div
                    class="product-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
                    <img src="https://via.placeholder.com/300" alt="Product" class="w-full h-72 object-cover">
                    <div class="p-4">
                        <h3 class="product-name text-lg font-medium text-gray-900">Modern Laptop</h3>
                        <p class="product-description mt-1 text-sm text-gray-500">High-performance laptop with the latest
                            features.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-lg font-semibold text-emerald-600">Rp 12.999.000</p>
                            <button
                                class="add-to-cart px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div
                    class="product-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
                    <img src="https://via.placeholder.com/300" alt="Product" class="w-full h-72 object-cover">
                    <div class="p-4">
                        <h3 class="product-name text-lg font-medium text-gray-900">Wireless Earbuds</h3>
                        <p class="product-description mt-1 text-sm text-gray-500">Premium wireless earbuds with noise
                            cancellation.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-lg font-semibold text-emerald-600">Rp 1.899.000</p>
                            <button
                                class="add-to-cart px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div
                    class="product-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
                    <img src="https://via.placeholder.com/300" alt="Product" class="w-full h-72 object-cover">
                    <div class="p-4">
                        <h3 class="product-name text-lg font-medium text-gray-900">Smart Watch</h3>
                        <p class="product-description mt-1 text-sm text-gray-500">Feature-rich smartwatch with health
                            monitoring.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-lg font-semibold text-emerald-600">Rp 2.499.000</p>
                            <button
                                class="add-to-cart px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div
                    class="product-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
                    <img src="https://via.placeholder.com/300" alt="Product" class="w-full h-72 object-cover">
                    <div class="p-4">
                        <h3 class="product-name text-lg font-medium text-gray-900">Digital Camera</h3>
                        <p class="product-description mt-1 text-sm text-gray-500">Professional digital camera for
                            photography enthusiasts.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-lg font-semibold text-emerald-600">Rp 8.999.000</p>
                            <button
                                class="add-to-cart px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-12">
                <h3 class="text-lg font-medium text-gray-900">No products found</h3>
                <p class="mt-2 text-gray-500">Try adjusting your search terms</p>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div id="newsletter-section" class="bg-emerald-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-gray-600 mb-6">Get the latest updates about our products and offers.</p>
                <form id="newsletter-form" class="max-w-md mx-auto">
                    @csrf
                    <div class="flex gap-4">
                        <input type="email" name="email" placeholder="Enter your email"
                            class="flex-1 px-4 py-2 rounded-lg border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
                        <button type="submit"
                            class="px-6 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
