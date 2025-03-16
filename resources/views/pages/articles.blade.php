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
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">News Article</h1>
            </div>
            
            <div class="flex flex-wrap -m-4">
                @foreach($articles as $article)
                <div class="xl:w-1/4 md:w-1/2 p-4 flex">
                    <a href="{{ route('articles.details', $article->id) }}" class="w-full">
                        <div class="bg-gray-100 p-6 rounded-lg flex flex-col justify-between h-full">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" 
                                src="{{ asset($article->image_path) }}" alt="content">
                            <h3 class="tracking-widest text-yellow-500 text-xs font-medium title-font">
                                {{ strtoupper($article->category) }}
                            </h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $article->title }}</h2>
                            <p class="leading-relaxed text-base flex-grow">
                                {{ Str::limit($article->description, 100) }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>