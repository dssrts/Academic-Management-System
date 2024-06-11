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
    <div class="flex flex-col h-screen font-inter">
        <!-- Header -->
        <div class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
                <img src="images/plm-logo.png" alt="PLM AMS" class="h-9 ml-3 mr-2">
                <h1 class="text-[24px] font-bold ml-2 text-blue">PLM AMS</h1>
            </div>
        </div>

        <div class="flex flex-1 overflow-hidden font-inter">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Evaluation'])

            <!-- Main content -->
            <div class="flex-1 pb-10 pr-12 pl-12 pt-5 overflow-hidden" x-data="{ status: 'completed' }"> <!-- Using Alpine.js for status -->
                <div class="flex flex-col space-y-3">
                    <div class="flex justify-between items-start">
                        <!-- Status Card -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between w-1/4">
                            <div>
                                <h2 class="text-blue font-bold text-[16px]">SFE Status</h2>
                                <p class="text-black-300 text-[12px] ">1st SEM - AY 2023-2024</p>
                                <div class="relative text-white w-48 h-16 py-2 px-4 rounded-lg flex items-center justify-start mt-2">
                                    <img :class="status !== 'completed' ? 'grayscale' : ''" src="images/card-image.png" alt="Card Image" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                    <span class="relative z-10 text-[16px] font-bold" x-text="status.charAt(0).toUpperCase() + status.slice(1)"></span>
                                </div>
                            </div>
                        </div>
                        <button class="bg-blue font-bold hover:bg-blue-hover text-white text-[14px] py-2 px-4 rounded-lg mt-28">
                            PLM SFE
                        </button>
                        
                    </div>

                    <!-- Status Table -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-center bg-blue text-white p-4 rounded-t-lg">
                            <h2 class="font-bold text-[20px] italic">Status of SFE per Course</h2>
                        </div>
                        <div class="p-4 overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 text-[14px]">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">Professor</th>
                                        <th class="py-2 px-4 border-b">Course Subject</th>
                                        <th class="py-2 px-4 border-b">Course ID</th>
                                        <th class="py-2 px-4 border-b">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sfeData as $data)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $data['professor'] }}</td>
                                        <td class="py-2 px-4 border-b">{{ $data['course_subject'] }}</td>
                                        <td class="py-2 px-4 border-b">{{ $data['course_id'] }}</td>
                                        <td class="py-2 px-4 border-b {{ $data['status_class'] }}">{{ $data['status'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
