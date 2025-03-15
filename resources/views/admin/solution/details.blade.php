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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/custom.css'])
</head>
<body>
    @include('partials.sidebar')

    <div class="main-content">
        <div class="content-header flex-container">
            <div class="content">
                <div class="flex justify-end">
                    <a href="{{ route('admin.solutions') }}" class="add-button">
                        Back to Solution
                    </a>
                </div>

                <section class="text-gray-600 body-font">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Solution Detail</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="container px-5 py-12 mx-auto">
                        <div class="md:col-span-2 bg-gray-300 p-8 rounded-lg shadow-md relative">
                            <h2 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $solution->title }}</h2>

                            <div class="space-y-4 text-gray-700 text-justify leading-relaxed">
                                <p>{{ $solution->description }}</p>
                            </div>

                            <p class="absolute bottom-4 right-4 text-sm text-gray-500">
                                Published on: {{ $solution->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
