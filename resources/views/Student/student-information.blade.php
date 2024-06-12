<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .progress-bar {
            position: relative;
            height: 70px; /* Made the progress bar taller */
            background-color: #e1e5f0;
            border-radius: 5px;
        }
        .progress-bar-fill {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: #4F74BB;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')
        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Information'])

            <!-- Main content -->
            <div class="flex-1 p-4 overflow-hidden flex items-center justify-center">
                <div class="w-full">
                    <div class="flex justify-between mb-4">
                        <div class="flex-1"></div>
                        <div class="flex items-center bg-blue text-white px-3 py-2 rounded font-bold space-x-2">
                            <svg  class = "mr-2 "width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.792 13.896L11.792 18.896L7.79203 7.896L18.792 11.896L13.792 13.896ZM13.792 13.896L18.792 18.896M5.98027 1.13452L6.75672 4.0323M3.92826 6.86072L1.03049 6.08426M12.7417 2.94629L10.6204 5.06761M4.96367 10.7244L2.84234 12.8457" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Student Portal
                        </div>
                    </div>                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 max-w-4xl mx-auto">
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between h-48">
                            <div class="mb-2">
                                <h2 class="text-heading5 font-bold text-blue"> <strong> Semester Progress </strong> </h2>
                                <p class="text-gray-700 text-xs">1ST SEM - AY 2023-2024</p>
                            </div>
                            <div class="progress-bar mt-1">
                                <div class="progress-bar-fill" style="width: {{ $semProgress }}%;">{{ $semProgress }}%</div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between h-48">
                            <h2 class="text-heading5 font-bold mb-1 text-blue"> <strong> Current Overall GWA: </strong> </h2>
                            <div class="relative bg-cover bg-center h-28 w-full mt-1 rounded-lg" style="background-image: url('images/card-image.png');">
                                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-start pl-4 text-[20px] font-bold text-white-10">{{ $gwa }} General Weighted <br> Average</div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between h-48">
                            <h2 class="text-heading5 font-bold mb-1 text-blue"> <strong> Student Status </strong> </h2>
                            <p class="text-gray-700 text-xs mb-2">1ST SEM - AY 2023-2024</p>
                            <div class="relative bg-cover bg-center h-28 w-full mt-1 rounded-lg" style="background-image: url('images/card-image.png');">
                                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-start pl-4 text-[24px] font-bold text-white-10">
                                    @if ($studentTerms->enrolled == 0)
                                        Regular
                                    @elseif ($studentTerms->enrolled == 1)
                                        Irregular
                                    @endif
                                </div>                              
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between h-48">
                            <h2 class="text-heading5 font-bold mb-2 text-blue"> <strong> Student Information </strong></h2>
                            <div class="flex items-center mb-1">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($student->first_name.' '.$student->last_name) }}&background=4F74BB&color=fff&rounded=true" alt="Student Photo" class="h-11 w-11 rounded-full border-2 border-blue mr-4">
                                <div class="flex-1">
                                    <p class="text-gray-800 text-[14px] text-base font-bold">{{ $student->first_name." ".$student->last_name }}</p>
                                    <p class="text-gray-500 text-[12px]"> Student Id: {{ $student->student_no }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="flex items-center text-[11px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-chevron-double-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 3.707 2.354 9.354a.5.5 0 1 1-.708-.708z"/>
                                        <path fill-rule="evenodd" d="M7.646 6.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 7.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
                                      </svg>
                                    <p class="text-gray-700"><strong>Year Level:</strong> {{$studentTerms->year_level}}</p>
                                </div>
                                <div class="flex items-center  text-[11px] ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building mr-3" viewBox="0 0 16 16">
                                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                                      </svg>
                                    <p class="text-gray-700"><strong>College:</strong> {{$college->college_name}} </p>
                                </div>
                                <div class="flex items-center col-span-2  text-[11px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-marker-tip" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5 6.064-1.281-4.696A.5.5 0 0 0 9.736 9H6.264a.5.5 0 0 0-.483.368l-1.28 4.696A6.97 6.97 0 0 0 8 15c1.275 0 2.47-.34 3.5-.936m.873-.598a7 7 0 1 0-8.746 0l1.19-4.36a1.5 1.5 0 0 1 1.31-1.1l1.155-3.851c.213-.713 1.223-.713 1.436 0l1.156 3.851a1.5 1.5 0 0 1 1.31 1.1z"/>
                                      </svg>
                                    <p class="text-gray-700"><strong>Course:</strong> {{$program->program_title}} </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
