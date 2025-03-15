<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
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

                <section class="text-gray-600 body-font">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Inquiry Details</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="container px-5 py-12 mx-auto">
                        <div class="md:col-span-2 bg-gray-300 p-8 rounded-lg shadow-md relative">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-gray-900 text-2xl title-font font-medium">Inquiry from {{ $inquiry->name }}</h2>
                                <a href="{{ route('inquiries.replyForm', $inquiry->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-600 flex items-center">
                                    <i class="bx bx-share mr-2"></i> Reply to Customer
                                </a>
                            </div>

                            <div class="space-y-4 text-gray-700">
                                <p><strong>Email:</strong> {{ $inquiry->email }}</p>
                                <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
                                <p><strong>Company Name:</strong> {{ $inquiry->company_name ?? 'N/A' }}</p>
                                <p><strong>Country:</strong> {{ $inquiry->country }}</p>
                                <p><strong>Job Title:</strong> {{ $inquiry->job_title ?? 'N/A' }}</p>
                                <p><strong>Job Details:</strong> {{ $inquiry->job_details ?? 'N/A' }}</p>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <p class="text-sm text-gray-500">
                                    Received on: {{ $inquiry->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

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
            }
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
