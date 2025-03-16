<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css','resources/js/app.js'])

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

        <div class="flex-content">
            <section class="text-gray-600 body-font relative mt-10">
                <div class="container px-5 mx-auto w-[550px] bg-gray shadow-md rounded-md">
                    <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-yellow-500">Contact Us</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">
                            Reach out to us with your inquiries, and our team will get back to you promptly.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your Full Name" required 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('name')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('email')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Your Phone Number" required 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('phone')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="company_name" class="leading-7 text-sm text-gray-600">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Your Company Name" 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('company_name')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="country" class="leading-7 text-sm text-gray-600">Country</label>
                                    <input type="text" id="country" name="country" value="{{ old('country') }}" placeholder="Your Country" 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('country')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="job_title" class="leading-7 text-sm text-gray-600">Job Title</label>
                                    <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}" placeholder="Your Job Title" 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @error('job_title')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="job_details" class="leading-7 text-sm text-gray-600">Job Details</label>
                                    <textarea id="job_details" name="job_details" placeholder="Provide a brief description of your job or requirements" 
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:border-yellow-500 focus:ring-yellow-500 ring-offset-2 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('job_details') }}</textarea>
                                </div>
                                @error('job_details')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="p-2 w-full flex justify-center py-3">
                                <button type="submit" class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
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
            } else {
                toast.classList.remove('error');
            }
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
