<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-[380px] bg-white rounded-lg p-8 shadow-xl border border-yellow-300">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-yellow-500">NextGen Solutions</h1>
            <p class="text-gray-600 mt-2">Log in to your account</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="relative">
                <label for="email" class="block text-gray-700 font-medium text-sm mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username"
                    class="block w-full px-4 py-2 text-sm text-black rounded border focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 focus:outline-none"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="relative">
                <label for="password" class="block text-gray-700 font-medium text-sm mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    class="block w-full px-4 py-2 text-sm text-black rounded border focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 focus:outline-none"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-yellow-500" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <button 
                type="submit" 
                class="w-full py-2 px-4 bg-yellow-500 text-white rounded-md text-sm font-medium hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                Log in
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-600">
            Don’t have an account? 
            @if (Route::has('register'))
                <a class="text-yellow-500 font-medium" href="{{ route('register') }}">Sign up for free!</a>
            @endif
        </div>
    </div>
</body>
</html>
