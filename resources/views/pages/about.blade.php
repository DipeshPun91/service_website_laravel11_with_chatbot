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
        <div class="container mx-auto flex px-5 py-24 md:flex-row-reverse flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="about-us-image" src="/images/hero-image.png">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:mr-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">About NextGen Solutions</h1>
                <p class="mb-8 leading-relaxed">At NextGen Solutions, we specialize in creating innovative and tailored software solutions that help businesses improve efficiency, productivity, and growth. We work closely with clients to understand their unique challenges and develop strategies that address their specific needs.</p>
                <p class="mb-8 leading-relaxed">With years of experience in the industry, our team is committed to providing cutting-edge technology and expert support to help businesses achieve their goals. Our focus is on creating scalable, secure, and future-proof solutions that deliver long-term value.</p>
                <div class="flex justify-center">
                    <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Contact us</button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-20">
                <h1 class="sm:text-3xl text-2xl font-semibold title-font text-gray-900 mb-4">Our Core Values</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">
                    At NextGen Solutions, our core values guide everything we do. These principles ensure that we remain focused on delivering exceptional solutions and building lasting relationships with our clients.
                </p>
            </div>

            <div class="flex flex-wrap sm:flex-nowrap justify-between gap-4">
                <div class="flex-1 p-4 flex flex-col bg-gray-100">
                    <div class="flex flex-col justify-between h-full p-6 text-center">
                        <h2 class="text-gray-900 text-xl font-medium mb-3">Innovation</h2>
                        <p class="leading-relaxed text-base text-gray-600 text-justify">
                            We are dedicated to pushing the boundaries of technology, constantly exploring new possibilities to create cutting-edge solutions for our clients.
                        </p>
                    </div>
                </div>

                <div class="flex-1 p-4 flex flex-col bg-gray-100">
                    <div class="flex flex-col justify-between h-full p-6 text-center">
                        <h2 class="text-gray-900 text-xl font-medium mb-3">Integrity</h2>
                        <p class="leading-relaxed text-base text-gray-600 text-justify">
                            We believe in doing business with honesty and transparency, ensuring that our clients receive reliable and trustworthy services at all times.
                        </p>
                    </div>
                </div>

                <div class="flex-1 p-4 flex flex-col bg-gray-100">
                    <div class="flex flex-col justify-between h-full p-6 text-center">
                        <h2 class="text-gray-900 text-xl font-medium mb-3">Customer-Centric Approach</h2>
                        <p class="leading-relaxed text-base text-gray-600 text-justify">
                            Our clients are at the heart of everything we do. We strive to build strong partnerships, offering tailored solutions that meet their specific needs and goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>