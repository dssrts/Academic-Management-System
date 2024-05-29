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
    <title>Student Details</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <h2 class="text-3xl font-bold">Student Details</h2>
            <p class="mt-4">Here you can view the details of the student.</p>
            
            <!-- Student Information -->
            <div class="mt-6 bg-white rounded-lg shadow-md p-6" style="background-color: white">
                <table class="min-w-full bg-white">
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 font-bold">Student No:</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $student->student_no }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 font-bold">First Name:</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $student->first_name }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 font-bold">Last Name:</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $student->last_name }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 font-bold">Email:</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 font-bold">Year Level:</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $student->year_level }}</td>
                        </tr>
                        <!-- Add more fields as necessary -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
