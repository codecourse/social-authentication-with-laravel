<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="space-y-2">
        <a href="{{ route('auth.redirect') }}" class="border border-gray-200 bg-gray-800 text-white flex items-center justify-center h-12 font-semibold rounded-lg">Sign in with X</a>
    </div>
</x-guest-layout>
