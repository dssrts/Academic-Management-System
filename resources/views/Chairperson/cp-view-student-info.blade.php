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
    <title>Student Information</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10" x-data="{ tab: 'personal' }">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">Student Information</h2>
                <a href="{{ route('view-students') }}" class="text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </div>

            <div class="mb-6">
                <ul class="flex border-b">
                    <li class="-mb-px mr-1">
                        <a :class="{ 'border-blue-500 text-blue-500': tab === 'personal', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'personal' }"
                            @click.prevent="tab = 'personal'" href="#"
                            class="inline-block py-2 px-4 border-b-2 font-semibold">Personal Information</a>
                    </li>
                    <li class="-mb-px mr-1">
                        <a :class="{ 'border-blue-500 text-blue-500': tab === 'records', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'records' }"
                            @click.prevent="tab = 'records'" href="#"
                            class="inline-block py-2 px-4 border-b-2 font-semibold">Student Records</a>
                    </li>
                    <li class="-mb-px mr-1">
                        <a :class="{ 'border-blue-500 text-blue-500': tab === 'classes', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'classes' }"
                            @click.prevent="tab = 'classes'" href="#"
                            class="inline-block py-2 px-4 border-b-2 font-semibold">Classes</a>
                    </li>
                </ul>
            </div>

            <div x-show="tab === 'personal'" class="bg-white rounded-lg p-6 shadow-lg mb-6"
                style="background-color: white">
                <h3 class="text-2xl font-semibold mb-4">Personal Information</h3>
                <table class="w-full table-auto">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Student Number</td>
                            <td class="border px-4 py-2">{{ $student->student_no }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Name</td>
                            <td class="border px-4 py-2">{{ $student->first_name }} {{ $student->middle_name }} {{
                                $student->last_name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Email</td>
                            <td class="border px-4 py-2">{{ $student->email }}</td>
                        </tr>
                        <!-- Add more personal information fields here -->
                    </tbody>
                </table>
            </div>

            <div x-show="tab === 'records'" class="bg-white rounded-lg p-6 shadow-lg mb-6"
                style="background-color: white">
                <h3 class="text-2xl font-semibold mb-4">Student Records</h3>
                <table class="w-full table-auto">
                    <thead class="bg-blue" style="color:white">
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
            </div>

            <div x-show="tab === 'classes'" class="bg-white rounded-lg p-6 shadow-lg" style="background-color: white">
                <h3 class="text-2xl font-semibold mb-4">Classes</h3>
                <table class="w-full table-auto">
                    <thead class="bg-blue" style="color:white">
                        <tr>
                            <th class="px-4 py-2">Code</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Units</th>
                            <th class="px-4 py-2">Day</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Building</th>
                            <th class="px-4 py-2">Room</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Professor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                        <tr>
                            <td class="border px-4 py-2">{{ $class->code }}</td>
                            <td class="border px-4 py-2">{{ $class->name }}</td>
                            <td class="border px-4 py-2">{{ $class->description }}</td>
                            <td class="border px-4 py-2">{{ $class->units }}</td>
                            <td class="border px-4 py-2">{{ $class->day }}</td>
                            <td class="border px-4 py-2">{{ $class->start_time }} - {{ $class->end_time }}</td>
                            <td class="border px-4 py-2">{{ $class->building }}</td>
                            <td class="border px-4 py-2">{{ $class->room }}</td>
                            <td class="border px-4 py-2">{{ $class->type }}</td>
                            <td class="border px-4 py-2">{{ $class->professor ? $class->professor->first_name . ' ' .
                                $class->professor->last_name : 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>