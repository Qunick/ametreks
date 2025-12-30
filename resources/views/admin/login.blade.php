<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        
        <!-- Logo / Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Admin Login</h1>
            <p class="text-sm text-gray-500 mt-2">Sign in to access dashboard</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="admin@example.com"
                    required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600 outline-none transition"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="••••••••"
                    required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600 outline-none transition"
                >
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Remember me
                </label>
                <a href="#" class="text-blue-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 active:scale-[0.98] transition-all shadow-lg"
            >
                Login
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 text-center text-xs text-gray-400">
            © {{ date('Y') }} Admin Panel. All rights reserved.
        </div>

    </div>
</div>
