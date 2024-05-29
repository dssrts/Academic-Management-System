<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chairperson Dashboard</title>
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
        <h2 class="text-3xl font-bold">Welcome, Chairperson</h2>
        <p class="mt-4">This is your dashboard. You can view and manage students from here.</p>
        <!-- Add more content here -->
    </div>
</body>
</html>