<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AME Treks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
        }
        
        .input-focus:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    </div>
    <div class="relative z-10 w-full max-w-md">
        <div class="login-card rounded-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold gradient-text mb-2">Admin Login</h1>
                <p class="text-gray-500">Access your dashboard securely</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="admin@example.com"
                            required
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none transition"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-key mr-2 text-blue-500"></i>Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="••••••••"
                            required
                            id="password"
                            class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none transition"
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                        >
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" class="sr-only peer" id="remember">
                            <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-checked:border-blue-500 peer-checked:bg-blue-500 flex items-center justify-center transition">
                                <i class="fas fa-check text-white text-xs hidden peer-checked:block"></i>
                            </div>
                        </div>
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 hover:underline">
                        Forgot password?
                    </a>
                </div>
                <button 
                    type="submit"
                    class="w-full py-3 rounded-lg bg-[#005991] text-white font-semibold transition"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">Optional sign in</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition flex items-center justify-center">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span>Google</span>
                    </button>
                    <button type="button" class="py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition flex items-center justify-center">
                        <i class="fab fa-microsoft text-blue-500 mr-2"></i>
                        <span>Microsoft</span>
                    </button>
                </div>
            </form>
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-400">
                    © {{ date('Y') }} Admin Panel. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Add input focus effects
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-200');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-200');
            });
        });
    </script>
</body>
</html>