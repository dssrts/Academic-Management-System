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
        <div class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
                <img src="images/plm-logo.png" alt="PLM AMS" class="h-9 ml-3 mr-2">
                <h1 class="text-[24px] font-bold ml-2 text-blue"> PLM AMS</h1>
            </div>
        </div>

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Schedule'])

            <!-- Main content -->
            <div class="flex-1 p-10 overflow-hidden flex flex-col items-center">
                <div class="flex justify-between items-center mb-4 w-full max-w-[950px]">
                    <div class="text-[20px] font-bold text-blue">
                    </div>
                    <div class="flex space-x-5">
                        <button class="bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded">
                            Academic Calendar
                        </button>
                        <button class="bg-blue hover:bg-blue-hover text-white font-bold py-2 px-4 rounded">
                            Go to Classroom
                        </button>
                    </div>
                </div>
                <!-- Status Table -->
                <div class="bg-white rounded-lg shadow-md w-full max-w-[950px]">
                    <div class="flex items-center justify-center bg-blue text-white p-4 rounded-t-lg">
                        <h2 class="font-bold text-[20px]">Class Schedule</h2>
                    </div>
                    <div class="p-4 overflow-x-auto ">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Course Subject</th>
                                    <th class="py-2 px-4 border-b">Course ID</th>
                                    <th class="py-2 px-4 border-b">Professor</th>
                                    <th class="py-2 px-4 border-b">Building</th>
                                    <th class="py-2 px-4 border-b">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b"></td>
                                    <td class="py-2 px-4 border-b"></td>
                                    <td class="py-2 px-4 border-b"></td>
                                    <td class="py-2 px-4 border-b"></td>
                                    <td class="py-2 px-4 border-b"></td>
                                </tr>
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
