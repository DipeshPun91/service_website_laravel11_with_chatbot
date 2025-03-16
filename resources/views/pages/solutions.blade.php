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
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Our Past Solutions</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($solutions as $solution)
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col relative">
                        <a href="{{ route('solutions.details', $solution->id) }}">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">{{ $solution->title }}</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">{{ $solution->description }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>