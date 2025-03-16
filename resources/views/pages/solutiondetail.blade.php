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

    <section class="bg-white body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Solution Detail</h1>
                <div class="h-1 w-20 bg-yellow-500 rounded mx-auto mt-3"></div>
            </div>

            <div class="container px-5 py-12 mx-auto">
                <div class="md:col-span-2 bg-gray-100 p-8 rounded-lg shadow-md relative">
                    <h2 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $solution->title }}</h2>

                    <div class="space-y-4 text-gray-700 text-justify leading-relaxed">
                        <p>{{ $solution->description }}</p>
                    </div>

                    <p class="absolute bottom-4 right-4 text-sm text-gray-500">
                        Published on: {{ $solution->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>