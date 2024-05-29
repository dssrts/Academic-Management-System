<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 h-screen">
        <div class="text-white p-4">
            <h1 class="text-2xl font-bold">Chairperson Dashboard</h1>
        </div>
        <nav class="text-white">
            <ul>
                <li class="p-4 hover:bg-gray-700">
                    <a href="{{ route('cp-dashboard') }}">Dashboard</a>
                </li>
                <li class="p-4 hover:bg-gray-700">
                    <a href="{{ route('view-students') }}">View Students</a>
                </li>
                <!-- Add more sidebar options here -->
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold">Students List</h2>
        <p class="mt-4">Here you can view and manage students.</p>
        
        <!-- Students Table -->
        <div class="mt-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Student No</th>
                        <th class="py-2 px-4 border-b">First Name</th>
                        <th class="py-2 px-4 border-b">Last Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Year Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $student->student_no }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->first_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->last_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->year_level }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
