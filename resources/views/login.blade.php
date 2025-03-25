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
                            placeholder="stanley@gmail.com"
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
                            placeholder="••••••••••••"
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
            
            <!-- Right Side - Illustration -->
            <div class="w-full md:w-1/2 bg-purple-500 relative hidden md:block">
                <div class="absolute inset-0 overflow-hidden">
                    <!-- Cloud elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full opacity-80 -mr-10 -mt-10"></div>
                    <div class="absolute top-1/4 left-1/4 w-24 h-24 bg-white rounded-full opacity-80"></div>
                    <div class="absolute bottom-0 right-1/4 w-40 h-40 bg-white rounded-full opacity-80 mb--10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white rounded-full opacity-80 -ml-10 -mb-10"></div>
                    
                    <!-- Illustration -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="relative w-4/5 h-4/5">
                            <!-- Phone -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-80 bg-pink-200 rounded-3xl border-4 border-gray-800 shadow-xl">
                                <!-- Phone camera -->
                                <div class="absolute top-3 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-gray-800 rounded-full"></div>
                                
                                <!-- Phone content - Fingerprint -->
                                <div class="absolute inset-0 flex flex-col items-center justify-center p-4">
                                    <div class="w-16 h-16 border-2 border-white rounded-full flex items-center justify-center">
                                        <div class="w-12 h-12 border border-white rounded-full flex items-center justify-center">
                                            <div class="w-8 h-8 border border-white rounded-full"></div>
                                        </div>
                                    </div>
                                    <div class="text-xs text-white mt-2 text-center">
                                        <p>Scan your finger</p>
                                        <p>to unlock your phone</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Person -->
                            <div class="absolute bottom-1/4 left-1/4">
                                <div class="relative w-32 h-48">
                                    <!-- Yellow jacket -->
                                    <div class="absolute top-8 w-24 h-24 bg-yellow-400 rounded-t-full"></div>
                                    
                                    <!-- Head -->
                                    <div class="absolute top-0 left-8 w-10 h-12 bg-gray-700 rounded-t-full"></div>
                                    
                                    <!-- Legs -->
                                    <div class="absolute bottom-0 left-6 w-8 h-20 bg-white rounded-t-lg transform rotate-12"></div>
                                    <div class="absolute bottom-0 left-12 w-8 h-20 bg-white rounded-t-lg transform -rotate-12"></div>
                                    
                                    <!-- Arm -->
                                    <div class="absolute top-12 right-4 w-6 h-16 bg-yellow-400 rounded-full transform rotate-45"></div>
                                </div>
                            </div>
                            
                            <!-- Check mark bubble -->
                            <div class="absolute top-1/4 left-1/3 w-12 h-12 bg-white rounded-full flex items-center justify-center">
                                <div class="w-6 h-6 text-purple-500">✓</div>
                            </div>
                            
                            <!-- Lock -->
                            <div class="absolute right-1/4 top-1/2 w-12 h-16 bg-white rounded-lg flex flex-col items-center justify-center">
                                <div class="w-6 h-4 border-2 border-gray-300 rounded-t-full"></div>
                                <div class="w-8 h-8 bg-white border-2 border-gray-300 rounded-md mt-1 flex items-center justify-center">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>