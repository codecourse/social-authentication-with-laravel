<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="space-y-2">
        <a href="{{ route('auth.redirect', 'twitter') }}" class="border border-gray-200 bg-gray-800 text-white flex items-center justify-center h-12 font-semibold rounded-lg">Sign in with X</a>

        <a href="{{ route('auth.redirect', 'github') }}" class="border border-gray-200 bg-gray-800 text-white flex items-center justify-center h-12 font-semibold rounded-lg">Sign in with GitHub</a>
    </div>

    <div class="text-center text-sm mt-6">
        <a href="{{ route('login') }}" class="text-indigo-500">Login</a> or <a href="{{ route('register') }}" class="text-indigo-500">register</a> with email
    </div>
</x-guest-layout>
