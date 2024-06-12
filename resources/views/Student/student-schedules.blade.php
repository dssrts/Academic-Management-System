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
                            <div class="flex items-center bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                  </svg>
                                Academic Calendar
                            </div>
                        </a>                        
                        <a href="https://www.microsoft.com/en-us/microsoft-teams/log-in" target="_blank">
                            <div class="flex items-center bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded text-[14px] space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-buildings" viewBox="0 0 16 16">
                                    <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                                    <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                                  </svg>
                                Go to Classroom
                            </div>
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
