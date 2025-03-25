<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Finnger</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-6xl bg-white rounded-3xl overflow-hidden shadow-lg flex flex-col md:flex-row">
            <!-- Left Side - Login Form -->
            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-12">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-purple-600 rounded-full mr-2"></div>
                        <span class="font-medium">Finnger</span>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">Holla,<br />Welcome Back</h1>
                    <p class="text-gray-500 text-sm">Hey, welcome back to your special place</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="space-y-4 mb-6">
                    @csrf
                    <div>
                        <input 
                            type="email" 
                            name="email"
                            placeholder="Email"
                            class="w-full p-3 border rounded-lg"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Password"
                            class="w-full p-3 border rounded-lg"
                            required
                        />
                        @error('password')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline">
                            Forgot Password?
                        </a>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg"
                    >
                        Sign In
                    </button>
                </form>
                
                <div class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-purple-600 hover:underline ml-1">
                        Sign Up
                    </a>
                </div>
            </div>
            
        <!-- Right Side - Illustration with Background Image & Border -->
        <div class="w-full md:w-1/2 hidden md:block bg-cover bg-center border-[10px] border-white rounded-3xl"
            style="background-image: url('{{ asset('assets/img/bg.jpeg') }}');">
        </div>
        </div>
    </div>
</body>
</html>
