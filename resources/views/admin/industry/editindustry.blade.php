<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Boxicons CDN -->
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>
<body>
    @include('partials.sidebar')

    <section id="content" class="text-gray-600 body-font">
        <nav>
            <i class="bx bx-menu"></i>
        </nav>

        <div class="container w-[500px] h-auto p-8">
            <h1 class="text-2xl font-semibold mb-6">Edit Industry</h1>
            
            <form action="{{ route('industries.update', $industry->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT') 
                
                <div class="mb-4">
                    <label for="industry" class="block text-gray-700 font-medium mb-2">Industry Name</label>
                    <input 
                        type="text" 
                        name="industry" 
                        id="industry" 
                        value="{{ old('industry', $industry->industry) }}"
                        placeholder="Enter industry name" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Update Industry
                </button>
            </form>
        </div>
    </section>
</body>
</html>
