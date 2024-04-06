<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
      x-data="{ btns:{registration:false, view: false, process: false, classroom: false, services: false}}">
     <!-- Whole Container -->
    <div class  = "w-screen h-screen  flex flex-row">
        <!-- Nav Division -->
        <nav class = "h-screen w-1/5 bg-blue flex flex-col">

            <!-- Student CRS Division -->
            <div class = "bg-blue flex flex-col justify-center items-center py-8 pb-3 gap-2">
                <h1 class = "text-white-10 font-inter font-bold italic text-[16px]">
                     Student CRS
                 </h1>
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle stroke-white-10" 
                 width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                 fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                  d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 
                  -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>
                 <div class = "bg-white-10 flex flex-col justify-center items-center py-2 pb-2 pl-7 pr-7 rounded-lg">
                    <h2 class = "font-inter text-blue text-[12px]"> <b> Welcome, {{$students->first_name}} </b>  </h2>
                    <h2 class = "font-inter font-bold text-blue text-[12px] leading-[10px]"> {{$students->student_no}} </h2>
                    <h2 class = "font-inter  text-gold-amber text-[12px]"> <b> Undergraduate </b> </h2>
                 </div>
            </div>

            <div class = "bg-blue flex flex-col font-inter">

                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 hover:text-white-10 group"
                                x-on:click="ButtonClick(btns,'registration')" 
                                x-bind:class="btns.registration ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
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
                       stroke-linecap="round" stroke-linejoin="round"  x-show="btns.registration"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                       <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                {{-- <!-- Registration Hidden -->
                <div x-show="btns.registration">
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Information
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Assessment
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Register
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Registration Form
                    </div>
                </div> --}}

                <!-- View Information -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover  hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'view')"
                                x-bind:class="btns.view ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
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

{{--                 
                <!-- View Information Hidden -->
                <div x-show="btns.view">
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Student <br> Information
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Grades
                    </div>
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Change Password
                    </div>

                </div> --}}

                <!-- Process Information Student -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'process')"
                                x-bind:class="btns.process ? 'bg-gold-amberfont-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                       d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" />
                       <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                        Process Infromation                         
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down hidden group-hover:flex" 
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                <!-- Process Information Hidden -->
                {{-- <div x-show="btns.process">
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Student <br> Information
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Leave of Absence <br> Application
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Registration Status
                    </div>

                </div> --}}
               
                <!-- Go to Classroom -->
                <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'classroom')"
                                x-bind:class="btns.classroom ? 'bg-gold-amber font-bold hover:bg-gold-amber hover:text-white-10 opacity-95': 'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chalkboard " width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"
                    fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                    <path d="M11 16m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>

                        Go to Classroom
                                           
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down hidden group-hover:flex" 
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M6 9l6 6l6 -6" /></svg> --}}
                </div>

                <!-- Go to Classroom Hidden-->
                {{-- <div x-show="btns.classroom">
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                             Current A.Y Curriculum
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                             Syllabus Course/Subject
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Designated Faculty
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Redirect to MS Teams
                    </div>

                </div> --}}


                <!-- Student Services -->
                {{-- <div class = "bg-blue flex flex-row gap-4 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 
                                duration-150 hover:bg-blue-hover hover:text-gold-hover hover:font-bold hover:text-[16px] hover:gap-5 group"
                                x-on:click="ButtonClick(btns,'services')"
                                x-bind:class="btns.services ? 'bg-gold-hover font-bold hover:bg-gold-hover hover:text-white-10 opacity-95': 'bg-blue'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                     fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"
                     fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        Student Services
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down hidden group-hover:flex" 
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M6 9l6 6l6 -6" /></svg> 
                </div> --}}


                <!-- Student Services Hidden-->
                {{-- <div x-show="btns.services">
                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                             University Library <br> Booking
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10 duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                             Consultation and <br> Counseling
                    </div>

                    <div class = "bg-blue-hover flex flex-row gap-2 pl-16 py-1 pb-1 text-[14px] text-white-10  duration-150 hover:bg-blue-surface group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden group-hover:flex" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Student Manual 
                    </div>  
                </div>
                 --}}
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
                    <u class="hover:text-gold-hover hover:opacity-95"> ithelp@plm.edu.ph </u> 
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

            <div class = "flex-1 flex flex-row justify-center items-center ">
                <!--SCHEDULE OF ACTIVITIES DIVISION-->
                <!--<div class="bg-white-10 h-[490px] w-[760px] rounded-xl  flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)]">
                        <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic"> 
                                STUDENT INFORMATION
                            </h1>
                        </div>
                        <div class="flex max-w-2xl mx-auto justify-center items-center">
                            <div class="flex rounded my-6 justify-center items-center">
                                <table class="w-full table-auto text-[11px] border-t">
                                    <thead>
                                        <tr>
                                            <th class="text-white-10 font-inter font-bold border-b border-r border-opacity-50 border-black-300 text-[12px] px-24 py-1 bg-blue-hover bg-opacity-95">Field</th>
                                            <th class="text-white-10 font-inter font-bold border-b text-[12px] px-24 py-1  bg-blue-hover bg-opacity-95">Data</th>
                                        </tr>
                                        <tr>
                                            <td class ="h-[4px]">
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
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 font-bold text-black-200 text-center align-middle">Telephone Number:</td>
                                        <td class="px-24 py-0 border-b border-opacity-50 border-black-200 text-center font-semibold text-black-300 align-middle">{{$students->telephone_no}}</td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                    </div>-->
                        
                    <div class="bg-white-10 h-[490px] w-[760px] rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden">
                        <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                            <h1 class="font-bold font-inter text-[20px] text-white-10 italic">VIEW GRADES</h1>
                        </div>
                        <div class="pt-3 flex justify-center items-center">
                            <form action="#" method="GET" class="flex">
                                <input type="text" name="year" placeholder="Ex. '20231' or 'all'" class="px-3 h-5 w-36 mr-4 text-[12px] text-black-200 mt-1 border rounded-2xl">
                                <input type="submit" class="bg-blue px-3 rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 w-20 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95" value="Filter">
                            </form>
                        </div>
                        <div class="pb-28 mt-3  font-inter text-[10px] text-black-300 table-wrp block max-h-full overflow-y-auto">
                            <table class="w-full border-collapse text-left">
                                <thead class="text-white-10 text-[11px] text-left border-b sticky top-0">
                                    <tr class="bg-blue text-white border">
                                        <th class="border-r border-black-200 py-2 px-4">Subject</th>
                                        <th class="border-r border-black-200 py-2 px-4">Code</th>
                                        <th class="border-r border-black-200 py-2 px-4">Grade</th>
                                        <th class="border-r border-black-200 py-2 px-4">Completion</th>
                                        <th class="border-r border-black-200 py-2 px-4">Remarks</th>
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
                    
                    <!-- View Grades Ending Division-->
                        

                    {{-- <!--REGISTER DIVISION-->
                    <div class = "bg-white-10 h-[240px] w-[760px] rounded-xl flex flex-col justify-center items-center text-center drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] border-[2px] border-blue">
                            <h1 class = "font-inter text-[29px] text-blue leading-8"> 
                                Please save a copy or print your <br>
                                <b> Student Enrollment Record (SER) </b> in <b  class = "text-gold" > STEP 4 </b> <br>
                                to be <i class = "text-gold">officially registered or enrolled</i>, and <br>
                                be added to your subject's MS Teams. <br>
                                The Start of classes will be on <b> August 29, 2023. </b>
                            </h1>
                    </div> --}}
            </div>
            </div>


        </div>
    </div>

<script>

    function ButtonClick(buttonlist,currentbutton) {
            // Reverse the current clicked button
        if(buttonlist.hasOwnProperty(currentbutton)) {
                buttonlist[currentbutton] = !buttonlist[currentbutton]
         }

        // Closed Other Buttons, Except The Clicked Buttons
         for(const key in buttonlist){
                if(buttonlist.hasOwnProperty(currentbutton) && String(key) != String(currentbutton)) {
                     buttonlist[key] = false
                }
         }
    }
</script>

</body>
</html>