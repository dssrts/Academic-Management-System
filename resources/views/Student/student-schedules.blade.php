<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Schedule'])

            <!-- Main content -->
            <div class="flex-1 p-10 overflow-hidden flex flex-col items-center">
                <div class="flex justify-between items-center mb-4 w-full max-w-[950px]">
                    <div class="text-[20px] font-bold text-blue">
                    </div>
                    <div class="flex space-x-5 text-[14px]">
                        <a href="{{ asset('images/academic-calendar-2024.jpg') }}" download>
                            <button class="bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded">
                                Academic Calendar
                            </button>
                        </a>                        
                        <a href="https://www.microsoft.com/en-us/microsoft-teams/log-in" target="_blank">
                            <button class="bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded text-[14px]">
                                Go to Classroom
                            </button>
                        </a>                        
                    </div>
                </div>
                <!-- Status Table -->
                <div class="bg-white rounded-lg shadow-md w-full max-w-[950px]">
                    <div class="flex items-center justify-center bg-blue text-white p-4 rounded-t-lg">
                        <h2 class="font-bold text-[20px] italic">Class Schedule</h2>
                    </div>
                    <div class="p-4 overflow-y-auto max-h-[500px] w-full">
                        <table class="text-[14px] min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Course Subject</th>
                                    <th class="py-2 px-4 border-b text-left">Course ID</th>
                                    <th class="py-2 px-4 border-b text-left">Professor</th>
                                    <th class="py-2 px-4 border-b text-left">Building</th>
                                    <th class="py-2 px-4 border-b text-left">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="py-2 px-4 border-b text-left">{{ $schedule->subject_title }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $schedule->subject_code }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $schedule->professor_name }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $schedule->building }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $schedule->time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
