<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Boxicons CDN -->
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            transform: translateX(0);
            background-color: #06d60d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            z-index: 1000;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
        }

        .toast.error {
            background-color: #f81808;
        }
    </style>
</head>
<body>
    <div class="flex-container">
        @include('partials.header')

        <div class="flex-content container mx-auto py-12">
            <div class="w-[600px] h-auto relative flex flex-col p-6 rounded-md text-black bg-white shadow-lg mx-auto">
                <div class="text-2xl font-bold mb-2 text-yellow-500 text-center">Leave a Review</div>
                <div class="text-sm font-normal mb-4 text-center text-[#1e0e4b]">We value your feedback and would love to hear from you.</div>

                <form method="POST" action="{{ route('reviews.store') }}" class="grid gap-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="block relative">
                            <label for="name" class="block text-gray-600 text-sm mb-2">Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                required 
                                class="rounded border border-gray-200 text-sm w-full p-2 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 ring-gray-900 outline-none"
                            >
                            @error('name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="block relative">
                            <label for="email" class="block text-gray-600 text-sm mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required 
                                class="rounded border border-gray-200 text-sm w-full p-2 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 ring-gray-900 outline-none"
                            >
                            @error('email')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="block relative">
                            <label for="company" class="block text-gray-600 text-sm mb-2">Company</label>
                            <input 
                                type="text" 
                                id="company" 
                                name="company" 
                                value="{{ old('company') }}"
                                class="rounded border border-gray-200 text-sm w-full p-2 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 ring-gray-900 outline-none"
                            >
                            @error('company')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="block relative">
                            <label for="rating" class="block text-gray-600 text-sm mb-2">Rating</label>
                            <select 
                                id="rating" 
                                name="rating" 
                                required 
                                class="rounded border border-gray-200 text-sm w-full p-2 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 ring-gray-900 outline-none"
                            >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="block relative">
                        <label for="feedback" class="block text-gray-600 text-sm mb-2">Feedback</label>
                        <textarea 
                            id="feedback" 
                            name="feedback"
                            required 
                            class="rounded border border-gray-200 text-sm w-full p-2 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 ring-gray-900 outline-none h-24"
                        >{{ old('feedback') }}</textarea>
                        @error('feedback')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-center mt-2">
                        <button type="submit" class="bg-yellow-500 px-6 py-2 rounded text-white text-sm mt-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        @include('partials.footer')
    </div>

    <div id="toast" class="toast"></div>

    <script>
        @if(session('success'))
        showToast('success', '{{ session('success') }}');
        @elseif(session('error'))
            showToast('error', '{{ session('error') }}');
        @endif

        function showToast(type, message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            if (type === 'error') {
                toast.classList.add('error');
            }
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
