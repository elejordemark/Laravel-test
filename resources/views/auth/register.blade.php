<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Finnger</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-3xl overflow-hidden shadow-lg p-8">
            <div class="mb-6">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-purple-600 rounded-full mr-2"></div>
                    <span class="font-medium">Finnger</span>
                </div>
            </div>
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">Create Account</h1>
                <p class="text-gray-500 text-sm">Join our community today</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-4 mb-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input 
                            type="text" 
                            name="first_name"
                            placeholder="First Name"
                            class="w-full p-3 border rounded-lg"
                            value="{{ old('first_name') }}"
                            required
                        />
                        @error('first_name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input 
                            type="text" 
                            name="last_name"
                            placeholder="Last Name"
                            class="w-full p-3 border rounded-lg"
                            value="{{ old('last_name') }}"
                            required
                        />
                        @error('last_name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <input 
                        type="email" 
                        name="email"
                        placeholder="Email Address"
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
                        placeholder="Create Password"
                        class="w-full p-3 border rounded-lg"
                        required
                    />
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <input 
                        type="password" 
                        name="password_confirmation"
                        placeholder="Confirm Password"
                        class="w-full p-3 border rounded-lg"
                        required
                    />
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg"
                >
                    Sign Up
                </button>
            </form>
            
            <div class="text-center text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-600 hover:underline ml-1">
                    Sign In
                </a>
            </div>
        </div>
    </div>
</body>
</html>
