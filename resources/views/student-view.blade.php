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
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }} }">
    <!-- Whole Container -->
    <div class  = "w-screen h-screen  flex flex-row">
        <!-- Nav Division -->
        <nav class = "h-screen w-1/5 bg-blue flex flex-col">

            <!-- Student CRS Division -->
            <div class = "bg-blue flex flex-col justify-center items-center py-8 pb-3 gap-2">
                <h1 class = "text-white-10 font-inter font-bold italic text-[20px]">
                    Student CRS
                </h1>
                <img src="{{ Avatar::create($students->first_name . ' ' . $students->last_name)->setBackground('#ffffff')->setForeground('#2D349A')->setDimension(80, 80)->setFontSize(24)->toBase64() }}"
                    style="border: 1px solid #2D349A; border-radius: 50%;" />
                <div
                    class = "bg-white-10 flex flex-col justify-center items-center py-2 pb-2 pl-7 pr-7 rounded-lg mt-2">
                    <h2 class = "font-inter text-blue text-[15]"> <b> Welcome, {{ $students->first_name }} </b> </h2>
                    <h2 class = "font-inter font-bold text-blue text-[15px] leading-[10px]"> {{ $students->student_no }}
                    </h2>
                    <h2 class = "font-inter  text-gold-amber text-[15px]"> <b> Undergraduate </b> </h2>
                </div>
            </div>

            <div class = "bg-blue flex flex-col font-inter mt-3">

                <!-- View Information -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                    x-on:click="ButtonClick(btns,'dashboard')"
                    x-bind:class="btns.dashboard ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 9a2 2 0 01-2-2V4a2 2 0 012-2h4a2 2 0 012 2v3a2 2 0 01-2 2H5zm0-2h4V4H5v3zm0 15a2 2 0 01-2-2v-8a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2H5zm0-2h4v-8H5v8zm8 0a2 2 0 002 2h4a2 2 0 002-2v-2a2 2 0 00-2-2h-4a2 2 0 00-2 2v2zm6 0h-4v-2h4v2zm-4-6a2 2 0 01-2-2V4a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2h-4zm0-2h4V4h-4v8z"
                            fill="currentColor" />
                    </svg>

                    <h1 class = "">Dashboard</h1>
                </div>

                <!-- View Schedules -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                    x-on:click="ButtonClick(btns,'schedule')"
                    x-bind:class="btns.schedule ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" width=24 height=24 fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0
                             5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.
                             008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7
                             .5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-
                             4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <h1 class = "">View Schedule</h1>
                </div>

                <!-- View Dashboard -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                    x-on:click="ButtonClick(btns,'information')"
                    x-bind:class="btns.information ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    </svg>

                    <h1 class = "">View Information</h1>
                </div>

                <!-- View Grades -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover  hover:font-bold hover:text-[16px] hover:gap-5 group"
                    x-on:click="ButtonClick(btns,'grades')"
                    x-bind:class="btns.grades ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-info h"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <path d="M11 14h1v4h1" />
                        <path d="M12 11h.01" />
                    </svg>
                    View Grades
                </div>

                <!-- Process Information Student -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                    x-on:click="ButtonClick(btns,'process')"
                    x-bind:class="btns.process ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                    </svg>
                    Submit Concerns
                </div>


                <!--Inbox Information Student -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                    x-on:click="ButtonClick(btns,'inbox')"
                    x-bind:class="btns.inbox ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                        'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-envelope-arrow-up" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354 1.25 1.25a.5.5 0 0 1-.708.708L13 12.207V14a.5.5 0 0 1-1 0v-1.717l-.28.305a.5.5 0 0 1-.737-.676l1.149-1.25a.5.5 0 0 1 .722-.016" />
                    </svg>
                    View Inbox
                </div>

                <!-- Go to Classroom -->
                <a href='https://www.microsoft.com/en-us/microsoft-teams/log-in'>
                    <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[14px] hover:gap-5 group"
                        x-on:click="ButtonClick(btns,'classroom')"
                        x-bind:class="btns.classroom ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95' :
                            'bg-blue'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chalkboard "
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                            <path d="M11 16m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        </svg>

                        Go to Classroom

                    </div>
                </a>

                <a href="{{ route('sign-in.get') }}">
                    <div
                        class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[14px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                        Log-Out
                    </div>
                </a>
            </div>

            <div class="flex pb-1 flex-col justify-end flex-1">
                <p class="pl-5 mt-2 text-white-10 text-[9px] font-inter align-self-end">
                    For more inquiries or concerns, please email:
                    <b>
                        <u class="hover:text-gold-hover hover:opacity-95"> <a href="https://mail.google.com/">
                                ithelp@plm.edu.ph </a></u>
                    </b>
                </p>
            </div>
        </nav>

        <!-- Main Division -->
        <div class = "flex flex-col flex-1">
            <!--PLM TITLE DIVISION-->
            <div class = "h-6 pl-4 py-10 flex flex-row justify-start items-center">
                <img class="h-14 w-15 mr-1 my-2" src="{{ url('images/plm-logo.png') }}">
                <div class = "leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]"> PAMANTASAN NG LUNGSOD NG MAYNILA
                    </h1>
                    <h2 class="text-[10px] font-inter text-black-200"> UNIVERSITY OF THE CITY OF MANILA </h2>
                </div>
            </div>

            <div class = "flex-1 flex flex-row justify-center items-center rounded-xl ">
                <div x-show="btns.dashboard"
                    class=" w-full h-full p-16 grid grid-cols-4 grid-rows-3 gap-x-4 gap-y-4 grid-flow-row">
                    <div
                        class="col-span-4 row-span-1 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] border-black-300 ">
                        <div id="progressBar"
                            class="bg-gray-600 h-full w-full rounded-l-2xl bg-blue flex items-center"
                            style="width: 50%">
                            <h2 id="progressText" class="ml-5 text-white-10 font-inter text-[26px] font-bold"> Course
                                Completion Rate (50%)</h2>
                        </div>
                    </div>
                    <div
                        class="row-span-2 col-span-2 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex items-end">
                        <div id="GWABar"class="bg-gray-600 w-full rounded-b-2xl bg-gold-amber flex items-center justify-center"
                            style="height: 50%">
                            <h2 id="GWAText" class="text-white-10 font-inter text-[26px] font-bold">Current GWA:1.5
                            </h2>
                        </div>
                    </div>
                    <div
                        class="col-span-2 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">Year Level</h1>
                        </div>
                        <div class ="h-full flex justify-center items-center p-4">
                            <h1 class="font-bold font-inter text-[18px] text-black-300">{{ $department->title }}
                                {{ $students->year_level }}-3 </h1>
                        </div>
                    </div>
                    <div class="bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">Status</h1>
                        </div>
                        <div class="h-full flex justify-center items-center p-4">
                            <h1
                                class="font-bold font-inter text-[16px] {{ $students->registration_status == 'Unenrolled' ? 'text-red' : 'text-green-bright' }}">
                                {{ $students->registration_status }}
                            </h1>
                        </div>
                    </div>
                    <div class="bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-gold-amber rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">SFE</h1>
                        </div>
                        <div class="h-full flex justify-center items-center p-4">
                            <h1 class="font-bold font-inter text-[16px]">
                                <?php
                                $phrases = ['Not answered yet', 'Completed'];
                                $selectedPhrase = $phrases[rand(0, 1)];
                                $color = $selectedPhrase == 'Not answered yet' ? 'red' : '#07AA07';
                                ?>
                                <span style="color: <?php echo $color; ?>;">
                                    <?php echo $selectedPhrase; ?>
                                </span>
                            </h1>
                        </div>

                    </div>
                </div>
                <!--View Schedules Division-->
                <!-- View Schedules Division -->
                <div x-data="{ showModal: false, modalContent: {} }" x-show="btns.schedule"
                class="w-full h-full p-4 flex justify-center font-inter">
                <div class="w-4/5">
                    <h2 class="text-[20px] font-bold text-center bg-blue text-white-10 p-2 rounded-t-md m-0">Class Schedule</h2>
                    <div class="overflow-x-auto mt-0">
                        <table class="w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-white-10">
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Monday</th>
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Tuesday</th>
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Wednesday</th>
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Thursday</th>
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Friday</th>
                                    <th class="border border-gray-200 p-2 w-1/6 text-[15px]">Saturday</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 5; $i++)
                                    <tr class="bg-white-10">
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                            <td class="border border-gray-200 p-1 h-20 hover:bg-blue hover:text-white-10 cursor-pointer"
                                                :class="{ 'bg-blue text-white-10': showModal && modalContent.day === '{{ $day }}' && modalContent.index === {{ $i }} }"
                                                @if (isset($schedule[$day][$i])) @click="showModal = true; modalContent = { 
                                                    name: '{{ $schedule[$day][$i]['name'] }}', 
                                                    code: '{{ $schedule[$day][$i]['code'] }}',
                                                    time: '{{ $schedule[$day][$i]['time'] }}', 
                                                    additionalInfo: '{{ $schedule[$day][$i]['building'] }} {{ $schedule[$day][$i]['room'] }}',
                                                    professor: '{{ $schedule[$day][$i]['professor'] }}',
                                                    type: '{{ $schedule[$day][$i]['type'] }}',
                                                    day: '{{ $day }}',
                                                    index: {{ $i }}
                                                }">
                                                <div class="text-center">
                                                    <span class="font-bold text-[12px] text-gold-amber">{{ $schedule[$day][$i]['name'] }} ({{$schedule[$day][$i]['building'] ." ".$schedule[$day][$i]['room'] }})</span><br>
                                                    <span class="text-[11px]">{{ $schedule[$day][$i]['time'] }}</span>
                                                </div> @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-white-10 bg-opacity-0">
                    <div class="bg-white-10 border-4 border-blue p-8 rounded-lg shadow-xl w-1/3">
                        <h2 class="text-[18px] text-blue font-bold mb-4" x-text="modalContent.name + ' (' + modalContent.code + ')'"></h2>
                        <p class="mb-4 text-[14px]">
                            <span class="font-bold">Time: </span>
                            <span x-text="modalContent.time"></span>
                        </p>
                        <p class="mb-4 text-[14px]">
                            <span class="font-bold">Room Building: </span>
                            <span x-text="modalContent.additionalInfo"></span>
                        </p>
                        <p class="mb-4 text-[14px]">
                            <span class="font-bold">Professor: </span>
                            <span x-text="modalContent.professor"></span>
                        </p>
                        <p class="mb-4 text-[14px]">
                            <span class="font-bold">Type: </span>
                            <span x-text="modalContent.type"></span>
                        </p>
                        <button @click="showModal = false"
                            class="bg-blue text-white-10 font-bold px-4 py-2 text-[14px] rounded">Close</button>
                    </div>
                </div>
            </div>
            


                <!--View Information Division-->
                <div x-show = "btns.information"
                    class="bg-white-10 h-[520px] w-2/3 rounded-xl  flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)]">
                    <div class="h-16 bg-blue rounded-tr-xl rounded-tl-xl flex justify-center items-center">
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">STUDENT INFORMATION</h1>
                    </div>
                    <div class="flex rounded my-6 justify-center items-center">
                        <table class="w-full table-auto text-[13px] border-t">
                            <thead>
                                <tr>
                                    <th
                                        class="text-white-10 font-inter font-bold border-b border-r border-b-blue border-white-10 text-[13px] px-24 py-1 bg-blue bg-opacity-100">
                                        Field</th>
                                    <th
                                        class="text-white-10 font-inter font-bold border-b border-b-blue border-white-10 text-[13px] px-24 py-1  bg-blue bg-opacity-100">
                                        Data</th>
                                </tr>
                                <tr>
                                    <td class ="h-[8px]">
                                    </td>
                                </tr>
                            </thead>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Student Number:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->student_no }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Last Name:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->last_name }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    First Name:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->first_name }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Middle Name:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->middle_name }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Sex:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->biological_sex }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Pedigree:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->pedigree }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Civil Status:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->civil_status }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Student Type:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->student_type }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Registration Status:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->registration_status }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Year Level:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->year_level }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    College:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $college->Code }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Department:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $department->code }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Permanent Address:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->permanent_address }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    PLM Email:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->plm_email }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Personal Email:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->email }}</td>
                            </tr>
                            <tr>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">
                                    Mobile Number:</td>
                                <td
                                    class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">
                                    {{ $students->mobile_no }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--View Grades Division-->
                <div x-show= "btns.grades"
                    class="bg-white-10 h-[520px] w-2/3 rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">VIEW GRADES</h1>
                    </div>
                    <div class="pt-3 flex justify-center items-center">
                        <form action="#" method="GET" class="flex">
                            <input type="hidden" name="panel" value="grades">
                            <input type="text" name="year" placeholder="Ex. '2023' or 'all'"
                                class="px-3 h-5 w-36 mr-4 text-[12px] text-black-200 mt-1 border rounded-2xl">
                            <input type="submit"
                                class="bg-blue px-3 rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 w-20 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95"
                                value="Filter">
                        </form>
                    </div>
                    <div
                        class="pb-28 mt-3  font-inter text-[12px] text-black-300 table-wrp block max-h-full overflow-y-auto">
                        <table class="w-full border-collapse text-left">
                            <thead
                                class="text-white-10 text-[13px] text-left border-b border-t-blue sticky top-[-2px]">
                                <tr class="bg-blue text-white border">
                                    <th class="border-r  border-white-10 py-2 px-4">Subject</th>
                                    <th class="border-r  border-white-10 py-2 px-4">Code</th>
                                    <th class="border-r  border-white-10 py-2 px-4">Grade</th>
                                    <th class="border-r  border-white-10 py-2 px-4">Completion</th>
                                    <th class="border-r  border-white-10 py-2 px-4">Remarks</th>
                                </tr>
                            </thead>
                            <tbody class="overflow-y-auto" style="max-height: 300px;">
                                @php
                                    $totalGrade = 0;
                                    $totalGrades = count($grades);
                                @endphp
                                @if ($totalGrades > 0)
                                    @foreach ($grades as $grade)
                                        <tr>
                                            <td class="border border-black-200 py-2 px-4">
                                                @php
                                                    $class = \App\Models\ClassModel::find($grade->class_id);
                                                    if ($class) {
                                                        echo $class->name;
                                                    } else {
                                                        echo 'Subject Not Found';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="border border-black-200 py-2 px-4">
                                                @php
                                                    $class = \App\Models\ClassModel::find($grade->class_id);
                                                    if ($class) {
                                                        echo $class->code;
                                                    } else {
                                                        echo 'Code Not Found';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="border border-black-200 py-2 px-4">{{ $grade->grade }}</td>
                                            <td class="border border-black-200 py-2 px-4">
                                                {{ $grade->completion_grade }}</td>
                                            <td class="border border-black-200 py-2 px-4">{{ $grade->remarks }}</td>
                                        </tr>
                                        @php
                                            $totalGrade += $grade->grade;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2"
                                            class="border border-black-200 py-2 px-4 text-right font-inter font-bold">|
                                            General Weighted Average :</td>
                                        <td class="border border-black-200 py-2 px-4 font-bold" colspan="3">
                                            {{ number_format($totalGrade / $totalGrades, 2) }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5"
                                            class="border border-black-200 py-2 px-4 text-center font-bold">No grades
                                            found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Submit Concerns Division-->
                <div x-show= "btns.process"
                    class="bg-white-10 h-10/12 w-2/3 rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">SUBMIT CONCERNS</h1>
                    </div>
                    <div class="p-8 font-inter text-[14px]">
                        <form action="{{ route('student-view.post-request', ['id' => $students->student_no]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="studentnumber" class="block text-sm font-bold text-gray-700">
                                    Student Number
                                </label>
                                <input type="text" id="studentnumber" name="studentnumber"
                                    value="{{ $students->student_no }}"
                                    class="pl-2 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                     block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    readonly>
                            </div>
                            <div class="mb-4">
                                <label for="recipientemail" class="block text-sm font-bold text-gray-700">
                                    Recipient Email
                                </label>
                                <select id="recipientemail" name="recipientemail"
                                    class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                                    @foreach (DB::table('users')->where('department_id', $students->degree_program)->where('account_type', 'Chairperson')->get() as $user)
                                        <option value={{ $user->email }}>
                                            {{ $user->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-bold text-gray-700">
                                    Subject
                                </label>
                                <select id="subject" name="subject"
                                    class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                                    <option value="Academic Performance Concerns">Academic Performance Concerns
                                    </option>
                                    <option value="Leave of Absence Request (LOA)">Leave of Absence Request (LOA)
                                    </option>
                                    <option value="Class Schedule Conflicts">Class Schedule Conflicts</option>
                                    <option value="Scholarship Compliance">Scholarship Compliance</option>
                                    <option value="Technology Access Concerns">Technology Access Concerns</option>
                                    <option value="Request for Transcript of Records (TOR)">Request for Transcript of
                                        Records(TOR)</option>
                                    <option value="Library Resource Accessibility">Library Resource Accessibility
                                    </option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Enrollment Issues">Enrollment Issues</option>
                                    <option value="Internship Concerns">Internship Concerns</option>
                                    <option value="Proposal for Research Funding">Proposal for Research Funding
                                    </option>
                                    <option value="Others">Others</option>

                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="block text-sm font-bold text-gray-700" required>
                                    Message
                                </label>
                                <textarea id="message" name="message" rows="4" placeholder="Enter Something..."
                                    class="p-2 h-36 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required></textarea>
                            </div>
                            <div class="mb-4 justify-center flex">
                                <input type="file" placeholder=".pdf only" name="pdf_file"
                                    class="font-inter block mr-1 text-[12px] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <p class="font-inter mt-2 mr-8 text-[11px] text-gray-500 dark:text-gray-200"
                                    id="file_input_help">.pdf (max 2 mb)</p>
                                <input type="submit"
                                    class="bg-blue px-3 w-1/5 text-center rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95"
                                    value="Submit">
                                @if (isset($send) && $send === 'success')
                                    <svg height="20px" class="ml-4 mr-2 mt-[3px]" version="1.1"
                                        viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title />
                                        <desc />
                                        <defs />
                                        <g fill="none" fill-rule="evenodd" id="Page-1" stroke=""
                                            stroke-width="1">
                                            <g fill="#378805" id="Core"
                                                transform="translate(-128.000000, -86.000000)">
                                                <g id="check-circle-outline"
                                                    transform="translate(128.000000, 86.000000)">
                                                    <path
                                                        d="M5.9,8.1 L4.5,9.5 L9,14 L19,4 L17.6,2.6 L9,11.2 L5.9,8.1 L5.9,8.1 Z M18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 C10.8,2 11.5,2.1 12.2,2.3 L13.8,0.7 C12.6,0.3 11.3,0 10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 L18,10 L18,10 Z"
                                                        id="Shape" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="font-inter mt-1 text-[12px] text-green font-semibold"
                                        id="file_input_help">
                                        Sent
                                    </p>
                                @elseif (isset($send) && $send === 'error')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        class="ml-4 mr-2 mt-[3px]" fill="#E63049" class="bi bi-x-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                    <p class="font-inter mt-1 text-sm text-red font-semibold" id="file_input_help">
                                        Request Error
                                    </p>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
                <!--Inbox Division-->
                <div x-show="btns.inbox"
                    class="container mx-auto bg-blue w-5/6 font-inter bg-opacity-95 shadow-xl rounded-xl text-[13px]">
                    <div class="bg-white p-6 rounded-lg shadow-md h-128 w-full overflow-auto">
                        <div class="mb-4">
                            <h2 class="text-[22px] font-bold text-center text-white-10 font-inter italic">STUDENT INBOX
                            </h2>
                            <input type="text" id="searchInput" placeholder="Search by subject..."
                                class="mb-1 mt-3 px-4 py-2 w-full rounded-xl border-1 border-blue focus:outline-none focus:border-blue-500 transition-colors">
                        </div>
                        <div class="space-y-4">
                            @foreach ($appeals as $appeal)
                                <div class="p-4 rounded-lg bg-white-10 shadow-xl cursor-pointer appeal-item {{ empty($appeal->remarks) ? 'opacity-90' : 'opacity-100' }}
                                    hover:opacity-95 bg-white-10"
                                    onclick="toggleVisibility(this)">
                                    <div class="flex justify-between items-center">
                                        @if (!empty($appeal->remarks))
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-check-square-fill mr-2 text-green-bright"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="mr-2 text-gold-amber bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        @endif
                                        <h3 class="text-lg font-semibold text-[16px] text-black-200 flex-grow">
                                            {{ $appeal->subject }}</h3>
                                        <span class="text-black-200 text-sm">{{ $appeal->created_at }}</span>
                                    </div>
                                    <p class="text-black-200 text-[12px]"><span>To: </span>{{ $appeal->user->email }}
                                    </p>
                                    <div class="hidden">
                                        <hr class="mt-2 bg-gray-100 bg-opacity-50 border-0 h-px">
                                        <p class="text-gray-700 mt-2">{{ $appeal->message }}</p>
                                        @if ($appeal->filepath)
                                            <p class="text-blue-500 mt-2 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="#2D349A" class="bi bi-filetype-pdf mr-1"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                                </svg>
                                                <a href="{{ $appeal->filepath }}" target="_blank"
                                                    class="hover:underline text-blue ">View attached file</a>
                                            </p>
                                        @endif
                                        <hr class="mt-2 bg-gray-100 bg-opacity-50 border-0 h-px">
                                        <p class="text-gray-500 mt-2">Remarks: {{ $appeal->remarks }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <script>
            function ButtonClick(buttonlist, currentbutton) {
                if (buttonlist.hasOwnProperty(currentbutton) && buttonlist[currentbutton]) {
                    return;
                }
                if (buttonlist.hasOwnProperty(currentbutton)) {
                    buttonlist[currentbutton] = !buttonlist[currentbutton];
                }
                for (const key in buttonlist) {
                    if (buttonlist.hasOwnProperty(currentbutton) && String(key) !== String(currentbutton)) {
                        buttonlist[key] = false;
                    }
                }
            }

            function toggleVisibility(element) {
                const content = element.querySelector("div.hidden");
                if (content.style.display === "none") {
                    content.style.display = "block"; // Shows the content
                } else {
                    content.style.display = "none"; // Hides the content
                }
            }

            function updateGWA() {
                let gwa = Math.random() * (2.0000 - 1.0000) + 1.0000;
                gwa = Math.round(gwa * 10000) / 10000; // Round to 4 decimal places
                let heightPercentage = ((3.0000 - gwa) / (3.0000 - 1.0000)) * 100;
                heightPercentage = Math.round(heightPercentage); // Round to nearest whole number for CSS
                const gwaBar = document.getElementById('GWABar');
                const gwaText = document.getElementById('GWAText');
                gwaBar.style.height = `${heightPercentage}%`;
                gwaText.textContent = `Current GWA: ${gwa}`;
            }

            function CompletionRateBar() {
                var progressBar = document.getElementById('progressBar');
                var progressText = document.getElementById('progressText'); // Get the text element
                var randomWidth = Math.floor(Math.random() * (61 - 20) + 40);
                progressBar.style.width = randomWidth + '%';
                progressText.innerText = `Course Completion Rate (${randomWidth}%)`;
            }
            document.addEventListener("DOMContentLoaded", function() {
                CompletionRateBar();
                updateGWA();
            });


            document.getElementById('searchInput').addEventListener('keyup', function() {
                var searchValue = this.value.toLowerCase();
                var appeals = document.querySelectorAll('.appeal-item');

                appeals.forEach(function(item) {
                    var subject = item.querySelector('h3').textContent.toLowerCase();
                    if (subject.includes(searchValue)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        </script>
</body>

</html>
