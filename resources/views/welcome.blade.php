<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NextGen Solutions</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/botman.js'])
    </head>
    <body>
        @include('partials.header')

        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero" src="/images/hero-image.png">
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Transform Your Business with
                        <br class="hidden lg:inline-block">Our Software Solutions
                    </h1>
                    <p class="mb-8 leading-relaxed">Our tailor-made software solutions are designed to streamline your processes, enhance productivity, and deliver exceptional results. Explore our portfolio of services and solutions that have helped countless businesses thrive.</p>
                    <div class="flex justify-center">
                        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Contact us</button>
                        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-semibold title-font text-gray-900 mb-4">
                        Our Features
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">
                        Discover how our software solutions drive innovation, efficiency, and results for industries worldwide. Explore highlights of our offerings and success stories.
                    </p>
                </div>

                <div class="flex flex-wrap sm:flex-nowrap justify-between gap-4">
                    <div class="flex-1 p-4 flex flex-col bg-gray-100">
                        <div class="flex flex-col justify-between h-full p-6 text-center">
                            <h2 class="text-gray-900 text-xl font-medium mb-3">Innovative Software Solutions</h2>
                            <p class="leading-relaxed text-base text-gray-600 text-justify">
                                Tailored software solutions designed to meet the unique needs of industries across the globe. Boost productivity and streamline your operations.
                            </p>
                        </div>
                    </div>

                    <div class="flex-1 p-4 flex flex-col bg-gray-100">
                        <div class="flex flex-col justify-between h-full p-6 text-center">
                            <h2 class="text-gray-900 text-xl font-medium mb-3">Success Stories</h2>
                            <p class="leading-relaxed text-base text-gray-600 text-justify">
                                Explore the industries we’ve empowered with our cutting-edge solutions and learn how we’ve helped them achieve their goals.
                            </p>
                        </div>
                    </div>

                    <div class="flex-1 p-4 flex flex-col bg-gray-100">
                        <div class="flex flex-col justify-between h-full p-6 text-center">
                            <h2 class="text-gray-900 text-xl font-medium mb-3">Promotions & Insights</h2>
                            <p class="leading-relaxed text-base text-gray-600 text-justify">
                                Stay updated with our latest articles and promotional events. Discover how we’re shaping the future of software solutions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php
            use App\Models\Review;
            $reviews = Review::latest()->take(2)->get();
        @endphp
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">What Our Clients Say</h1>
                <div class="flex flex-wrap -m-4">
                    @foreach($reviews as $review)
                    <div class="p-4 md:w-1/2 w-full">
                        <div class="h-full bg-gray-100 p-8 rounded">
                            <div class="mb-4">
                                <span class="title-font font-medium text-gray-900 text-lg">{{ $review->name }}</span>
                            </div>
                            <div class="flex items-center mb-4">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $review->rating)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-yellow-500" viewBox="0 0 24 24">
                                            <path d="M12 .587l3.668 7.571L24 9.748l-6 5.848 1.416 8.268L12 18.897l-7.416 3.967L6 15.596 0 9.748l8.332-1.59L12 .587z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-gray-300" viewBox="0 0 24 24">
                                            <path d="M12 .587l3.668 7.571L24 9.748l-6 5.848 1.416 8.268L12 18.897l-7.416 3.967L6 15.596 0 9.748l8.332-1.59L12 .587z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            <p class="leading-relaxed mb-6">"{{ $review->feedback }}"</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-5">
                    <a href="{{ route('reviews.create') }}" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-base">
                        Leave Review
                    </a>
                </div>
            </div>
        </section>

        <div id="toast" class="toast"></div>

        <script>
            var botmanWidget = {
                aboutText: 'Welcome to NextGen Solution FAQ Page',
                introMessage: 'Start the conversation with "Hi"',
                bubbleBackground: '#f39c12',
                bubbleText: '#fff',
                headerBackground: '#f39c12',
                headerText: '#fff',
                launcherColor: '#f39c12',
                launcherText: 'Chat with us!',
                mainColor: '#f39c12',
                headerTitle: 'FAQ',
                hideWhenOffline: false
            };
        </script>

        @include('partials.footer')

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
