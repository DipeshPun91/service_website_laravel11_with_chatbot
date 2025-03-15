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
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Our Past Solutions</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @foreach ($solutions as $solution)
                        <div class="p-4 md:w-1/3">
                            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col relative">
                                <a href="{{ route('solutions.show', $solution->id) }}">
                                    <div class="flex items-center mb-3">
                                        <h2 class="text-gray-900 text-lg title-font font-medium">{{ $solution->title }}</h2>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="leading-relaxed text-base">{{ $solution->description }}</p>
                                    </div>
                                </a>
                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('solutions.edit', $solution->id) }}" 
                                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded hover:bg-yellow-400">
                                        <i class="bx bx-edit mr-2"></i>Edit
                                    </a>
                                    <button type="button" 
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded hover:bg-red-400 delete-button" 
                                            data-id="{{ $solution->id }}">
                                        <i class="bx bx-trash mr-2"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="toast" class="toast"></div>

    <div id="confirmation-dialog" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="flex flex-col bg-white w-[500px] h-auto rounded-lg p-6 shadow-lg">
            <h3 class="text-center font-bold text-2xl text-gray-800 pb-4">Delete Solution</h3>
            <p class="text-sm text-gray-500 my-3">Are you sure you want to delete this solution? This process cannot be undone.</p>
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

    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        const confirmationDialog = document.getElementById('confirmation-dialog');
        const cancelButton = document.getElementById('cancel-button');
        const confirmButton = document.getElementById('confirm-button');
        let solutionIdToDelete = null;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                solutionIdToDelete = button.getAttribute('data-id');
                confirmationDialog.classList.remove('hidden');
            });
        });

        cancelButton.addEventListener('click', function() {
            confirmationDialog.classList.add('hidden');
        });

        confirmButton.addEventListener('click', function() {
            if (solutionIdToDelete) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/solutions/${solutionIdToDelete}`;
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
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
