<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions - Send Email</title>

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

                <section class="text-gray-600 body-font">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Send Email to Customer</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="flex items-center justify-center">
                        <div class="container w-[600px] h-auto p-8">
                            <form action="{{ route('inquiries.reply', $inquiry->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                                @csrf
                                <div class="mb-4">
                                    <label for="customer_email" class="block text-gray-700 font-medium mb-2">Customer Email</label>
                                    <input 
                                        type="email" 
                                        name="customer_email" 
                                        id="customer_email" 
                                        value="{{ $inquiry->email }}" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="subject" class="block text-gray-700 font-medium mb-2">Email Subject</label>
                                    <input 
                                        type="text" 
                                        name="subject" 
                                        id="subject" 
                                        placeholder="Enter email subject" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 font-medium mb-2">Email Content</label>
                                    <textarea 
                                        name="message" 
                                        id="message" 
                                        rows="6" 
                                        placeholder="Write the email message here" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required></textarea>
                                </div>

                                <button 
                                    type="submit" 
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    Send Email
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
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
