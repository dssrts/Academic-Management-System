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
    <title>View Appeals</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }} }">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <h2 class="text-3xl font-bold">Appeals List</h2>
            <p class="mt-4">Here you can view and manage student appeals.</p>
            
            <!-- Appeals Table -->
            <div class="mt-6 bg-white rounded-lg shadow-md p-6 overflow-x-auto" style="color:white; background-color:white">
                <table class="min-w-full bg-white">
                    <thead class="bg-gold">
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">ID</th>
                            <th class="py-2 px-4 border-b border-gray-300">Student ID</th>
                            <th class="py-2 px-4 border-b border-gray-300">User ID</th>
                            <th class="py-2 px-4 border-b border-gray-300">Subject</th>
                            <th class="py-2 px-4 border-b border-gray-300">Message</th>
                            <th class="py-2 px-4 border-b border-gray-300">Filepath</th>
                            <th class="py-2 px-4 border-b border-gray-300">Remarks</th>
                            <th class="py-2 px-4 border-b border-gray-300">Viewed</th>
                            <th class="py-2 px-4 border-b border-gray-300">Created At</th>
                            <th class="py-2 px-4 border-b border-gray-300">Updated At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($appeals as $appeal)
                            <tr class="bg-white">
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->id }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->student_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->user_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->subject }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->message }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if($appeal->filepath)
                                        <a href="{{ asset($appeal->filepath) }}" class="text-blue-500 hover:underline" target="_blank">View File</a>
                                    @else
                                        No File
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->remarks }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->viewed }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->created_at }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $appeals->links() }}
            </div>
        </div>
    </div>
</body>
</html>
