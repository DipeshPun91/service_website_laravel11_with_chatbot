<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Gallery</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($photos as $photo)
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative h-[250px]">
                            <img alt="{{ $photo->title }}" 
                                 class="absolute inset-0 w-full h-full object-cover object-center" 
                                 src="{{ asset($photo->path) }}">
                            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 h-full flex flex-col justify-center">
                                <h1 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">
                                    {{ $photo->title }}
                                </h1>
                                <p class="leading-relaxed">
                                    {{ $photo->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
