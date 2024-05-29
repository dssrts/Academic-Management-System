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
    <title>View Students</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }} }">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <h2 class="text-3xl font-bold">Students List</h2>
            <p class="mt-4">Here you can view and manage students.</p>
            
            <!-- Students Table -->
            <div class="mt-6 rounded-lg shadow-md p-6 overflow-x-auto" style="background-color: white;">
                <table class="min-w-full bg-white">
                    <thead class="bg-blue" style="color:white">
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">Student No</th>
                            <th class="py-2 px-4 border-b border-gray-300">First Name</th>
                            <th class="py-2 px-4 border-b border-gray-300">Last Name</th>
                            <th class="py-2 px-4 border-b border-gray-300">Email</th>
                            <th class="py-2 px-4 border-b border-gray-300">Year Level</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($students as $student)
                            <tr class="bg-white">
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->student_no }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->first_name }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->last_name }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->email }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->year_level }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</body>
</html>
