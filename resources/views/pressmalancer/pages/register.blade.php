@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
            <div class="mb-8 text-center">
                <h1 class="mb-2">Create Account</h1>
                <p class="text-gray-500">Sign up to get started</p>
            </div>

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm select-none">Username</label>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            placeholder="Enter your username"
                            value="{{ old('username') }}"
                            required
                            class="mt-1.5 flex h-9 w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-1 text-base transition-colors outline-none focus:border-gray-900 focus:ring-[3px] focus:ring-gray-900/10 @error('username') border-red-500 @enderror"
                        />
                        @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm select-none">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Enter your email"
                            value="{{ old('email') }}"
                            required
                            class="mt-1.5 flex h-9 w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-1 text-base transition-colors outline-none focus:border-gray-900 focus:ring-[3px] focus:ring-gray-900/10 @error('email') border-red-500 @enderror"
                        />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm select-none">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Create a password"
                            required
                            class="mt-1.5 flex h-9 w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-1 text-base transition-colors outline-none focus:border-gray-900 focus:ring-[3px] focus:ring-gray-900/10 @error('password') border-red-500 @enderror"
                        />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm select-none">Confirm Password</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            placeholder="Confirm your password"
                            required
                            class="mt-1.5 flex h-9 w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-1 text-base transition-colors outline-none focus:border-gray-900 focus:ring-[3px] focus:ring-gray-900/10"
                        />
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="block text-sm select-none">Date of Birth</label>
                        <input
                            id="date_of_birth"
                            name="date_of_birth"
                            type="date"
                            value="{{ old('date_of_birth') }}"
                            required
                            class="mt-1.5 flex h-9 w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-1 text-base transition-colors outline-none focus:border-gray-900 focus:ring-[3px] focus:ring-gray-900/10 @error('date_of_birth') border-red-500 @enderror"
                        />
                        @error('date_of_birth')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full h-11 mt-6 bg-orange-500 hover:bg-orange-600 text-white rounded-md transition-colors"
                    >
                        Create Account
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <span class="w-full border-t border-gray-200"></span>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500">
                        Or continue with
                    </span>
                </div>
            </div>

            <!-- Google Button -->
            <a href="{{ route('auth.google', ['provider' => 'google']) }}"
            class="group flex items-center justify-center w-full border border-orange-400 rounded-md py-2 mb-3 hover:bg-orange-500 transition">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5 mr-2">
            <span class="text-gray-700 font-medium group-hover:text-white transition">Continue with Google</span>
        </a>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

