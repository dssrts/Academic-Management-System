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
            @include('components.student-sidebar', ['activePage' => 'Information'])


            <!-- Main content -->
            <div class="flex-1 p-10 overflow-hidden">
                <div class="flex justify-between mb-4">
                    <div class="flex-1"></div>
                    <button class="bg-blue text-white px-4 py-2 rounded">Student Portal</button>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <h2 class="text-heading5 font-bold mb-4">Semester Progress</h2>
                        <p class="text-gray-700">1ST SEM - AY 2023-2024</p>
                        <div class="relative w-full bg-gray-200 rounded-full h-6 mt-4">
                            <div class="absolute top-0 left-0 bg-blue h-6 rounded-full" style="width: 50%;"></div>
                            <div class="absolute top-0 left-0 w-full h-6 flex items-center justify-center text-white font-bold">50%</div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <h2 class="text-heading5 font-bold mb-4">Current Overall GWA:</h2>
                        <div class="text-[44px] font-bold text-blue mt-4">1.23</div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <h2 class="text-heading5 font-bold mb-4">Student Status</h2>
                        <p class="text-gray-700">1ST SEM - AY 2023-2024</p>
                        <div class="text-[44px] font-bold text-blue mt-3">Regular</div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <h2 class="text-heading5 font-bold mb-4">Student Information:</h2>
                        <p class="text-gray-700">
                            <strong>Name:</strong> John Doe<br>
                            <strong>Student Num:</strong> 123456789<br>
                            <strong>Year Level:</strong> 3<br>
                            <strong>College:</strong> College of Engineering<br>
                            <strong>Course:</strong> BS Computer Science
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
