<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftWave Solutions - Register</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="w-[400px] relative flex flex-col p-6 rounded-md text-black bg-white shadow-lg">
        <div class="text-2xl font-bold mb-2 text-[#1e0e4b] text-center">Create Your Account</div>
        <div class="text-sm font-normal mb-4 text-center text-[#1e0e4b]">Sign up to start your journey</div>

        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
            @csrf

            <div class="block relative">
                <label for="name" class="block text-gray-600 text-sm leading-[140%] font-normal mb-2">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-gray-900 outline-0"
                >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="block relative">
                <label for="email" class="block text-gray-600 text-sm leading-[140%] font-normal mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autocomplete="username" 
                    class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-gray-900 outline-0"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="block relative">
                <label for="password" class="block text-gray-600 text-sm leading-[140%] font-normal mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-gray-900 outline-0"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block relative">
                <label for="password_confirmation" class="block text-gray-600 text-sm leading-[140%] font-normal mb-2">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-gray-900 outline-0"
                >
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button 
                type="submit" 
                class="bg-blue-500 w-max m-auto px-6 py-2 rounded text-white text-sm font-normal">
                Register
            </button>
        </form>

        <div class="text-sm text-center mt-6">
            Already have an account? 
            <a class="text-sm text-blue-500" href="{{ route('login') }}">Log in</a>
        </div>
    </div>
</body>
</html>
