@extends('layouts.guest')

@section('title', 'Register')

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
                <h2 class="text-3xl font-bold text-primary">Create Account</h2>
                <p class="text-secondary mt-2">Join us to start shopping</p>
            </div>

            <div
                class="bg-card p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-sm border border-gray-100">
                <form class="space-y-6">
                    <div>
                        <input id="name" type="text" placeholder="Full Name" class="input-field" required>
                    </div>

                    <div>
                        <input id="email" type="email" placeholder="Email Address" class="input-field" required>
                    </div>

                    <div>
                        <input id="phone" type="tel" placeholder="Phone Number" class="input-field" required>
                    </div>

                    <div>
                        <textarea id="address" placeholder="Address" class="input-field" rows="3" required></textarea>
                    </div>

                    <div>
                        <input id="password" type="password" placeholder="Password" class="input-field" required>
                    </div>

                    <div>
                        <input id="password_confirmation" type="password" placeholder="Confirm Password" class="input-field"
                            required>
                    </div>

                    <button class="w-full py-4 px-6 rounded-xl btn-primary font-medium">
                        Create Account
                    </button>
                </form>
            </div>

            <p class="mt-8 text-center text-secondary">
                Already have an account?
                <a href="{{ route('login') }}" class="text-accent font-medium hover:text-emerald-700">Sign in</a>
            </p>
        </div>
    </div>
@endsection
