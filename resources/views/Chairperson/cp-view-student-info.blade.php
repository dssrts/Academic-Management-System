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
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">Student Information</h2>
                <a style="color:white" href="{{ route('view-students') }}" class="bg-blue text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-hover transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </div>
            {{-- <h2 class="text-3xl font-bold">Student Details</h2>
            
            <p class="mt-4">Here you can view the details of the student.</p> --}}

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
            <div class="bg-white rounded-lg p-6 mt-6 shadow-lg" style="background-color:white">
                <h3 class="text-2xl font-semibold mb-4">Student Records</h3>
                @if($studentRecords->isEmpty())
                <p>No records found for this student.</p>
                @else
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Control No</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">School Year</th>
                            <th class="px-4 py-2">Semester</th>
                            <th class="px-4 py-2">Date Enrolled</th>
                            <th class="px-4 py-2">GWA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentRecords as $record)
                        <tr>
                            <td class="border px-4 py-2">{{ $record->control_no }}</td>
                            <td class="border px-4 py-2">{{ $record->status }}</td>
                            <td class="border px-4 py-2">{{ $record->school_year }}</td>
                            <td class="border px-4 py-2">{{ $record->semester }}</td>
                            <td class="border px-4 py-2">{{ $record->date_enrolled }}</td>
                            <td class="border px-4 py-2">{{ $record->GWA }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</body>

</html>