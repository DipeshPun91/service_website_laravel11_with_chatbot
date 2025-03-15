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
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Add New Solution</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="flex items-center justify-center">
                        <div class="container w-[500px] h-auto p-8">
                            <form action="{{ route('solutions.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 font-medium mb-2">Solution Title</label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        id="title" 
                                        placeholder="Enter solution title" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 font-medium mb-2">Solution Description</label>
                                    <textarea 
                                        name="description" 
                                        id="description" 
                                        rows="4" 
                                        placeholder="Write a short description about the solution" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="industry_id" class="block text-gray-700 font-medium mb-2">Select Industry</label>
                                    <select 
                                        name="industry_id" 
                                        id="industry_id" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                                        required>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->industry }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button 
                                    type="submit" 
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    Add Solution
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>    
        </div>    
    </div>    
</body>
</html>
