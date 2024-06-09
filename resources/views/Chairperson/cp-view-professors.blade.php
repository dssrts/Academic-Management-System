<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{ url('/images/plm-logo.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Professors</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="professorModal">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <!-- Header Section -->


            <!-- Content Section -->
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold">List of Professors in your Department</h2>
                    <button class="ml-2 px-4 py-2 bg-blue text-white rounded-lg" style="color:white"
                        @click="isModalOpen = true">Add Professor</button>
                </div>
                <form method="GET" action="{{ route('view-professors') }}">
                    <input type="text" name="search" placeholder="Search by name or email..."
                        class="px-3 py-2 mb-4 border rounded w-full" value="{{ request('search') }}">
                </form>
                <div class="bg-white rounded-lg p-6 mt-6 shadow-lg" style="background-color:white">
                    @if($professors->isEmpty())
                    <p>No professors found.</p>
                    @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-blue" style="color:white">
                                <tr>
                                    <th class="px-4 py-2">Last Name</th>
                                    <th class="px-4 py-2">First Name</th>
                                    <th class="px-4 py-2">Middle Name</th>
                                    {{-- <th class="px-4 py-2">Pronouns</th> --}}
                                    <th class="px-4 py-2">Email</th>
                                    {{-- <th class="px-4 py-2">College</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($professors as $professor)
                                <tr>
                                    <td class="border px-4 py-2">{{ $professor->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $professor->first_name }}</td>
                                    <td class="border px-4 py-2">{{ $professor->middle_name }}</td>
                                    {{-- <td class="border px-4 py-2">{{ $professor->pronouns }}</td> --}}
                                    <td class="border px-4 py-2">{{ $professor->email_address }}</td>
                                    {{-- <td class="border px-4 py-2">{{ $professor->college->college_name }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $professors->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal for adding a professor -->
    <div x-show="isModalOpen" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-600 opacity-50"></div>
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/2 z-50" style="background-color:white">
            <h2 class="text-2xl font-bold mb-4">Add Professor</h2>
            <form method="POST" action="{{ route('create-professor') }}">
                @csrf
                <div class="mb-4">
                    <label for="college_id" class="block text-sm font-bold mb-2">College</label>
                    <select name="college_id" id="college_id" class="block w-full mt-1 border rounded"
                        style="color:black">
                        @foreach($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->Title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-bold mb-2">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="block w-full mt-1 border rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-bold mb-2">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="block w-full mt-1 border rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="middle_name" class="block text-sm font-bold mb-2">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="block w-full mt-1 border rounded">
                </div>
                <div class="mb-4">
                    <label for="pronouns" class="block text-sm font-bold mb-2">Pronouns</label>
                    <select name="pronouns" id="pronouns" class="block w-full mt-1 border rounded">
                        <option value="">Select Pronouns</option>
                        <option value="he/him">he/him</option>
                        <option value="she/her">she/her</option>
                        <option value="they/them">they/them</option>
                        <option value="prefer not to say">prefer not to say</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="plm_email" class="block text-sm font-bold mb-2">PLM Email</label>
                    <input type="email" name="plm_email" id="plm_email" class="block w-full mt-1 border rounded"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="isModalOpen = false"
                        class="px-4 py-2 text-black rounded mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue text-white rounded"
                        style="background-color:#1E3A8A;">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('professorModal', () => ({
                isModalOpen: false
            }));
        });
    </script>
</body>

</html>