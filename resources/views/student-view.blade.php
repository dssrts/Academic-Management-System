<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{url('/images/plm-logo.png')}}">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
      x-data="{ btns:{{ json_encode($btns) }}}">
     <!-- Whole Container -->
    <div class  = "w-screen h-screen  flex flex-row">
        <!-- Nav Division -->
        <nav class = "h-screen w-1/5 bg-blue flex flex-col">

            <!-- Student CRS Division -->
            <div class = "bg-blue flex flex-col justify-center items-center py-8 pb-3 gap-2">
                <h1 class = "text-white-10 font-inter font-bold italic text-[20px]">
                     Student CRS
                 </h1>
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle stroke-white-10" 
                 width="90" height="90" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                 fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                  d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 
                  -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>
                 <div class = "bg-white-10 flex flex-col justify-center items-center py-2 pb-2 pl-7 pr-7 rounded-lg">
                    <h2 class = "font-inter text-blue text-[13px]"> <b> Welcome, {{$students->first_name}} </b>  </h2>
                    <h2 class = "font-inter font-bold text-blue text-[13px] leading-[10px]"> {{$students->student_no}} </h2>
                    <h2 class = "font-inter  text-gold-amber text-[13px]"> <b> Undergraduate </b> </h2>
                 </div>
            </div>

            <div class = "bg-blue flex flex-col font-inter mt-3">

                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                                x-on:click="ButtonClick(btns,'dashboard')" 
                                x-bind:class="btns.dashboard ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5 9a2 2 0 01-2-2V4a2 2 0 012-2h4a2 2 0 012 2v3a2 2 0 01-2 2H5zm0-2h4V4H5v3zm0 15a2 2 0 01-2-2v-8a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2H5zm0-2h4v-8H5v8zm8 0a2 2 0 002 2h4a2 2 0 002-2v-2a2 2 0 00-2-2h-4a2 2 0 00-2 2v2zm6 0h-4v-2h4v2zm-4-6a2 2 0 01-2-2V4a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2h-4zm0-2h4V4h-4v8z" fill="currentColor"/></svg>
                    
                    <h1 class = "">Dashboard</h1>
                </div>

                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                                x-on:click="ButtonClick(btns,'information')" 
                                x-bind:class="btns.information ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-user-plus" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                       fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                       <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" />
                       <path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                       
                       <h1 class = "">View Information</h1>

                       {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" 
                       width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                       stroke-linecap="round" stroke-linejoin="round"  x-show="btns.information"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                       <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                <!-- View Grades -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover  hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'grades')"
                                x-bind:class="btns.grades ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-info h" width="24" height="24" 
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <path d="M11 14h1v4h1" /><path d="M12 11h.01" /></svg>
                            View Grades
                        
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down hidden group-hover:flex" 
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                <!-- Process Information Student -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'process')"
                                x-bind:class="btns.process ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                       d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" />
                       <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                        Submit Concerns                         
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down hidden group-hover:flex" 
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                <!-- Go to Classroom -->
                <a href='https://www.microsoft.com/en-us/microsoft-teams/log-in'>
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'classroom')"
                                x-bind:class="btns.classroom ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chalkboard " width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"
                    fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                    <path d="M11 16m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>

                        Go to Classroom
                                           
                </div>
                </a>

            <a href="{{ route('sign-in.get') }}">
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" 
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                    stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                        Log-Out
                </div>
            </a>
            </div>  

            <div class="flex pb-2 flex-col justify-end flex-1">
                <p class="pl-5 mt-4 text-white-10 text-[9px] font-inter align-self-end"> 
                  For more inquiries or concerns, please email: 
                  <b> 
                    <u class="hover:text-gold-hover hover:opacity-95"> <a href="https://mail.google.com/"> ithelp@plm.edu.ph  </a></u> 
                  </b>
                </p>
            </div>
        </nav>

        <!-- Main Division -->
        <div class = "flex flex-col flex-1">
            <!--PLM TITLE DIVISION-->
            <div class = "h-6 pl-4 py-10 flex flex-row justify-start items-center">
                <img class="h-14 w-15 mr-1 my-2" src="{{url('images/plm-logo.png')}}">
                <div class = "leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]"> PAMANTASAN NG LUNGSOD NG MAYNILA </h1>
                    <h2 class="text-[10px] font-inter text-black-200"> UNIVERSITY OF THE CITY OF MANILA </h2>
                </div>
            </div>

            <div class = "flex-1 flex flex-row justify-center items-center rounded-xl ">
                <div x-show="btns.dashboard" class=" w-full h-full p-16 grid grid-cols-4 grid-rows-3 gap-x-4 gap-y-4 grid-flow-row"> 
                    <div class="col-span-4 row-span-1 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] border-black-300 ">
                        <div id="progressBar" class="bg-gray-600 h-full w-full rounded-l-2xl bg-blue flex items-center" style="width: 50%">
                                <h2 id="progressText" class="ml-5 text-white-10 font-inter text-[26px] font-bold"> Course Completion Rate (50%)</h2>
                        </div>
                    </div>
                    <div class="row-span-2 col-span-2 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex items-end">
                        <div id="GWABar"class="bg-gray-600 w-full rounded-b-2xl bg-gold-amber flex items-center justify-center" style="height: 50%">
                            <h2 id="GWAText" class="text-white-10 font-inter text-[26px] font-bold">Current GWA:1.5</h2>
                         </div>
                    </div>
                    <div class="col-span-2 bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">Year Level</h1>
                        </div>
                        <div class ="h-full flex justify-center items-center p-4">
                            <h1 class="font-bold font-inter text-[18px] text-black-300">{{$department->title}} {{$students->year_level}}-{{$students->block}} </h1>
                        </div>
                    </div>  
                    <div class="bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">Status</h1>
                        </div>
                        <div class ="h-full flex justify-center items-center p-4">
                            <h1 class="font-bold font-inter text-[16px] text-black-300">{{$students->registration_status}}</h1>
                        </div>
                    </div>
                    <div class="bg-white-10 rounded-2xl drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)] flex flex-col">
                        <div class="h-14 bg-gold-amber rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">SFE</h1>
                        </div>
                        <div class ="h-full flex justify-center items-center p-4">
                            <h1 class="font-bold font-inter text-[16px] text-black-300">
                                <?php
                                // Create an array with the phrases
                                $phrases = ["Not answered yet", "Complete"];
                        
                                // Randomly pick one phrase from the array
                                echo $phrases[rand(0, 1)];
                                ?>
                            </h1>                        
                        </div>
                    </div>
                </div>
                <!--View Information Division-->
                <div x-show = "btns.information" class="bg-white-10 h-[490px] w-[760px] rounded-xl  flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)]">
                        <div class="h-16 bg-blue rounded-tr-xl rounded-tl-xl flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">STUDENT INFORMATION</h1>
                        </div>
                            <div class="flex rounded my-6 justify-center items-center">
                                <table class="w-full table-auto text-[12px] border-t">
                                    <thead>
                                        <tr>
                                            <th class="text-white-10 font-inter font-bold border-b border-r border-b-blue border-white-10 text-[13px] px-24 py-1 bg-blue bg-opacity-100">Field</th>
                                            <th class="text-white-10 font-inter font-bold border-b border-b-blue border-white-10 text-[13px] px-24 py-1  bg-blue bg-opacity-100">Data</th>
                                        </tr>
                                        <tr>
                                            <td class ="h-[8px]">
                                            </td>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Student Number:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->student_no}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Last Name:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">First Name:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Middle Name:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->middle_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Sex:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->biological_sex}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Birthdate:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->birthdate}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Birthplace:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->birthdate_city}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Religion:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->religion}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Civil Status:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->civil_status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Student Type:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->student_type}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Registration Status:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->registration_status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Year Level:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->year_level}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">College:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$college->Code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Department:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$department->code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Permanent Address:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->permanent_address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">PLM Email:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->plm_email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Personal Email:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->personal_email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Mobile Number:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->mobile_no}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-24 py-0  border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Telephone Number:</td>
                                        <td class="px-24 py-0 border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->telephone_no}}</td>
                                    </tr>
                                    
                                    </tbody>
                             </table>
                     </div>
                </div>
                 <!--View Grades Division-->
                <div x-show= "btns.grades" class="bg-white-10 h-[490px] w-[760px] rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden"  >
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">VIEW GRADES</h1>
                    </div>
                    <div class="pt-3 flex justify-center items-center">
                        <form action="#" method="GET" class="flex">
                            <input type="hidden" name="panel" value="grades" >
                            <input type="text" name="year" placeholder="Ex. '20231' or 'all'" class="px-3 h-5 w-36 mr-4 text-[12px] text-black-200 mt-1 border rounded-2xl">
                            <input type="submit" class="bg-blue px-3 rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 w-20 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95" value="Filter">
                        </form>
                    </div>
                    <div class="pb-28 mt-3  font-inter text-[11px] text-black-300 table-wrp block max-h-full overflow-y-auto">
                        <table class="w-full border-collapse text-left">
                            <thead class="text-white-10 text-[12px] text-left border-b border-t-blue sticky top-[-2px]">
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
                                @if ($totalGrades > 0) {{-- Check if totalGrades is greater than 0 --}}
                                    @foreach ($grades as $grade)
                                        <tr>
                                            <td class="border border-black-200 py-2 px-4">
                                                @php
                                                    $subject = \App\Models\Subject::find($grade->subject_id);
                                                    if ($subject) {
                                                        echo $subject->subject_title;
                                                    } else {
                                                        echo "Subject Not Found";
                                                    }
                                                @endphp
                                            </td>
                                            <td class="border border-black-200 py-2 px-4">
                                                @php
                                                    $subject = \App\Models\Subject::find($grade->subject_id);
                                                    if ($subject) {
                                                        echo $subject->subject_code;
                                                    } else {
                                                        echo "Code Not Found";
                                                    }
                                                @endphp
                                            </td>
                                            <td class="border border-black-200 py-2 px-4">{{ $grade->grade }}</td>
                                            <td class="border border-black-200 py-2 px-4">{{ $grade->completion_grade }}</td>
                                            <td class="border border-black-200 py-2 px-4">{{ $grade->remarks }}</td>
                                        </tr>
                                        @php
                                            $totalGrade += $grade->grade;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="border border-black-200 py-2 px-4 text-right font-inter font-bold">| General Weighted Average :</td>
                                        <td class="border border-black-200 py-2 px-4 font-bold" colspan="3">{{ number_format($totalGrade / $totalGrades, 2) }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="border border-black-200 py-2 px-4 text-center font-bold">No grades found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Submit Concerns Division-->
                <div x-show= "btns.process" class="bg-white-10 h-[490px] w-[760px] rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden"  >
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">SUBMIT CONCERNS</h1>
                    </div>
                    <div class="p-8 font-inter text-[12px]">
                            <form action ="{{route('student-view.post-request', ['id' => $students->student_no])}}" method="POST"> 
                                @csrf     
                                 <div class="mb-4">
                                    <label for="studentnumber" class="block text-sm font-bold text-gray-700">
                                         Student Number
                                    </label>
                                    <input type="text" id="studentnumber" name="studentnumber" value="{{$students->student_no}}"
                                     class="pl-2 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                     block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                                 </div>
                                 <div class="mb-4">
                                    <label for="recipientemail" class="block text-sm font-bold text-gray-700">
                                        Recipient Email
                                    </label>
                                    <select id="recipientemail" name="recipientemail" class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        @foreach (DB::table('users')->where('department_id',$students->department_id)->where('account_type','Chairperson')->get() as $user )
                                            <option value={{$user->email}}>
                                                {{$user->email}}
                                            </option>
                                        @endforeach
                                    </select>      
                                </div>
                                <div class="mb-4">
                                    <label for="subject" class="block text-sm font-bold text-gray-700">
                                        Subject
                                    </label>
                                    <select id="subject" name="subject" class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        <option value="Academic Performance Concerns">Academic Performance Concerns</option>
                                        <option value="Leave of Absence Request (LOA)">Leave of Absence Request (LOA)</option>
                                        <option value="Class Schedule Conflicts">Class Schedule Conflicts</option>
                                        <option value="Scholarship Compliance">Scholarship Compliance</option>
                                        <option value="Technology Access Concerns">Technology Access Concerns</option>
                                        <option value="Request for Transcript of Records (TOR)">Request for Transcript of Records(TOR)</option>
                                        <option value="Library Resource Accessibility">Library Resource Accessibility</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Enrollment Issues">Enrollment Issues</option>
                                        <option value="Internship Concerns">Internship Concerns</option>
                                        <option value="Proposal for Research Funding">Proposal for Research Funding</option>
                                        <option value="Others">Others</option>

                                    </select>      
                                </div>

                                 <div class="mb-4">
                                    <label for="message" class="block text-sm font-bold text-gray-700" required>
                                        Message
                                    </label>
                                    <textarea id="message" name="message" rows="4" placeholder="Enter Something..." class="p-2 h-36 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                                 </div>
                                 <div class="mb-4 justify-center flex">
                                    <input type="file" placeholder=".pdf only" name="pdf_file" class="font-inter block mr-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                    <p class="font-inter mt-1 mr-8 text-sm text-gray-500 dark:text-gray-200" id="file_input_help">.pdf (max 5 mb)</p>
                                    <input type="submit" class="bg-blue px-3 w-1/4 text-center rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95" value="Submit">
                                    @if(isset($send) && $send === 'success')
                                    <svg height="20px" class="ml-4 mr-2 mt-[3px]" version="1.1" viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="" stroke-width="1"><g fill="#378805" id="Core" transform="translate(-128.000000, -86.000000)"><g id="check-circle-outline" transform="translate(128.000000, 86.000000)"><path d="M5.9,8.1 L4.5,9.5 L9,14 L19,4 L17.6,2.6 L9,11.2 L5.9,8.1 L5.9,8.1 Z M18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 C10.8,2 11.5,2.1 12.2,2.3 L13.8,0.7 C12.6,0.3 11.3,0 10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 L18,10 L18,10 Z" id="Shape"/></g></g></g></svg>
                                    <p class="font-inter mt-1 text-sm text-green font-semibold" id="file_input_help"> 
                                        request sent
                                    </p>
                                    @endif 
                                </div>

                            </form>
                    </div>
            </div>


        </div>
    </div>


<script>
    function ButtonClick(buttonlist, currentbutton) {
        // If the current button is already true, no need to change its state
        if (buttonlist.hasOwnProperty(currentbutton) && buttonlist[currentbutton]) {
            return;
        }
        
        // Reverse the current clicked button
        if (buttonlist.hasOwnProperty(currentbutton)) {
            buttonlist[currentbutton] = !buttonlist[currentbutton];
        }

        // Close other buttons, except the clicked button
        for (const key in buttonlist) {
            if (buttonlist.hasOwnProperty(currentbutton) && String(key) !== String(currentbutton)) {
                buttonlist[key] = false;
            }
        }
    }

    function updateGWA() {
        // Generate a random GWA between 1.0000 and 2.0000
        let gwa = Math.random() * (2.0000 - 1.0000) + 1.0000;
        gwa = Math.round(gwa * 10000) / 10000; // Round to 4 decimal places

        // Calculate height percentage based on GWA
        // Since the range is now 1.0000 to 2.0000 but 0% height should be at GWA of 3.0000:
        let heightPercentage = ((3.0000 - gwa) / (3.0000 - 1.0000)) * 100;
        heightPercentage = Math.round(heightPercentage); // Round to nearest whole number for CSS

        // Update the GWA display bar height and text
        const gwaBar = document.getElementById('GWABar');
        const gwaText = document.getElementById('GWAText');
        gwaBar.style.height = `${heightPercentage}%`;
        gwaText.textContent = `Current GWA: ${gwa}`;
    }

    
    function CompletionRateBar() {
    var progressBar = document.getElementById('progressBar');
    var progressText = document.getElementById('progressText');  // Get the text element

    // Generate a random integer between 20 and 80
    var randomWidth = Math.floor(Math.random() * (61 - 20) + 40);

    // Apply the random width to the style attribute
    progressBar.style.width = randomWidth + '%';

    // Update the text inside the <h2> element to reflect the new percentage
    progressText.innerText = `Course Completion Rate (${randomWidth}%)`;
    }

    document.addEventListener("DOMContentLoaded",function(){
        CompletionRateBar();
        updateGWA();
    });

</script>

</body>
</html>