<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solutions</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/custom.css'])

</head>

<body>
    @include('partials.sidebar')

    <div class="main-content">
        <div class="content-header flex-container">
            <div class="content">
                <div class="flex justify-end">
                    <a href="{{ route('solutions.create') }}" class="add-button">
                        Add Solution
                    </a>
                </div>

                <section class="text-gray-600 body-font">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Areas We Provide Service</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="w-full h-auto">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <table class="w-full table-auto">
                                    <thead class="bg-yellow-500 text-white">
                                        <tr>
                                            <th class="py-4 px-6 text-left text-sm font-semibold tracking-wider">Service Sector</th>
                                            <th class="py-4 px-6 text-center text-sm font-semibold tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($industries as $industry)
                                        <tr class="hover:bg-yellow-200 transition duration-150">
                                            <td class="py-4 px-6 text-left text-gray-700">
                                                <span class="font-medium">{{ $industry->industry }}</span>
                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <div class="flex items-center justify-center space-x-4">
                                                    <a href="{{ route('industries.edit', $industry->id) }}" 
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg shadow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 transition duration-150 ease-in-out">
                                                        <i class="bx bx-edit text-xl mr-2"></i>Edit
                                                    </a>
                                                    <form action="{{ route('industries.delete', $industry->id) }}" method="POST" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="button" data-id="{{ $industry->id }}" 
                                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 transition duration-150 ease-in-out delete-button">
                                                                <i class="bx bx-trash text-xl mr-2"></i>Delete
                                                            </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="confirmation-dialog" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="flex flex-col bg-white w-[500px] h-auto rounded-lg p-6 shadow-lg">
            <h3 class="text-center font-bold text-2xl text-gray-800 pb-4">Delete Service Sector</h3>
            <p class="text-sm text-gray-500 my-3">Are you sure you want to delete this service sector? This process cannot be undone.</p>
            <div class="flex justify-between items-center mt-6">
                <button id="cancel-button" class="flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition duration-200">
                    Cancel
                </button>
                <button id="confirm-button" class="flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        const confirmationDialog = document.getElementById('confirmation-dialog');
        const confirmButton = document.getElementById('confirm-button');
        const cancelButton = document.getElementById('cancel-button');

        let deleteForm;

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                deleteForm = button.closest('form'); 
                confirmationDialog.classList.remove('hidden');
            });
        });

        cancelButton.addEventListener('click', () => {
            confirmationDialog.classList.add('hidden'); 
        });

        confirmButton.addEventListener('click', () => {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
        
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
