@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-custom">
        <div class="w-full max-w-md mx-auto p-6">
            <div class="mb-12 text-center">
                <div
                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-8-6h16"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-primary">Welcome Back</h2>
                <p class="text-secondary mt-2">Sign in to continue shopping</p>
            </div>

            <div
                class="bg-card p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-sm border border-gray-100">
                <form class="space-y-6">
                    <div class="space-y-2">
                        <input type="email" placeholder="Enter your email" class="input-field" required>
                    </div>

                    <div class="space-y-2">
                        <input type="password" placeholder="Enter your password" class="input-field" required>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                            class="w-5 h-5 border-2 border-gray-300 rounded-lg text-emerald-500 focus:ring-emerald-500 mr-3">
                        <span class="text-sm text-secondary select-none">Keep me signed in</span>
                    </div>

                    <button class="w-full py-4 px-6 rounded-xl btn-primary font-medium">
                        Sign in
                    </button>
                </form>
            </div>

            <p class="mt-8 text-center text-secondary">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-accent font-medium hover:text-emerald-700">Create Account</a>
            </p>
        </div>
    </div>
@endsection
