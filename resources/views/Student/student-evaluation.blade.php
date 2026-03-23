<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;" x-data="clock()">
    <div class="flex flex-col h-screen font-inter">
        @include('components.student-header')
        <div class="flex flex-1 overflow-hidden font-inter">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Evaluation'])

            <!-- Main content -->
            <div class="flex-1 pb-10 pr-12 pl-12 pt-5 overflow-hidden" x-data="{ status: '{{ $hasIncompleteStatus ? 'incomplete' : 'completed' }}' }"> <!-- Using Alpine.js for status -->
                <div class="flex flex-col space-y-3 h-full">
                    <div class="flex justify-between items-start">
                        <!-- Status Card -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between w-1/4">
                            <div>
                                <h2 class="text-blue font-bold text-[16px]">SFE Status</h2>
                                <p class="text-black-300 text-[12px] ">{{ $currentSemester == 1 ? '1st SEM' : '2nd SEM' }} - AY {{ $academicYearDisplay }}</p>
                                <div class="relative text-white w-48 h-16 py-2 px-4 rounded-lg flex items-center justify-start mt-2">
                                    <img :class="status === 'incomplete' ? 'grayscale' : ''" src="images/card-image.png" alt="Card Image" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                    <span class="relative z-10 text-[16px] font-bold" x-text="status.charAt(0).toUpperCase() + status.slice(1)"></span>
                                </div>
                            </div>
                        </div>
                        <a href="https://web2.plm.edu.ph/sfe/" target="_blank" class="inline-flex items-center bg-blue font-bold hover:bg-blue-hover text-white text-[14px] py-2 px-4 rounded-lg mt-28">
                            <span class="inline-block mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1.131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                </svg>
                            </span>
                            PLM SFE
                        </a>                        
                        
                    </div>

                    <!-- Status Table -->
                    <div class="bg-white rounded-lg shadow-md flex-1 overflow-y-auto">
                        <div class="flex items-center justify-center bg-blue text-white p-4 rounded-t-lg">
                            <h2 class="font-bold text-[20px] italic">Status of SFE per Course</h2>
                        </div>
                        <div class="p-4 overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 text-[13px]">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b text-left">Professor</th>
                                        <th class="py-2 px-4 border-b text-left">Course Subject</th>
                                        <th class="py-2 px-4 border-b text-left">Course ID</th>
                                        <th class="py-2 px-4 border-b text-left">Status</th>
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
