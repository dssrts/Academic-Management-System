<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{url('/images/plm-logo.png')}}">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');

            .enlarged-image {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .enlarged-image img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class = "body-css flex flex-row justify-start" style="background-image: url('images/PLM.png'); background-repeat: no-repeat; background-size: cover"
               x-data="{nav_open: true, align:''}" x-bind:class="nav_open ? 'justify-start' : 'justify-center'">

     <!-- Navigation Bar Division-->
    <div class="h-screen menu w-1/5  flex-col drop-shadow-[0px_0px_4px_rgba(0,0,0,0.5)] opacity-.99] " x-show="nav_open">

        <!-- Top Nav Bar Division-->                
        <div class = "bg-blue h-3/4 grow flex-col flex items-center opacity-[.99]">

            <h1 class ="text-center text-bold font-extrabold text-[19px] italic font-inter text-white-10 mt-8 mb-5">
                Academic Management 
                <br> 
                System 
            </h1>

            <!-- PLM OFFICIAL WEBSITE BUTTON -->
            <button onclick="location.href='//www.plm.edu.ph'" class="bg-white-10 rounded-xl w-5/6 text-blue h-9 font-inter font-bold mb-4 flex flex-row justify-start items-center text-[13px]
            transition duration-100 ease-in-out  hover:bg-blue-hover hover:text-white-10 hover:font-normal hover:text-[14px] hover:opacity-95"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home ml-4 mr-2" 
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                 fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                 d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                 <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                 <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
                <div class="flex-1 mr-4 font-inter font-bold text-center ">
                     <span> PLM Official Website </span> 
                </div>
            </button>

            <!-- PLM SFE BUTTON -->
            <button class="bg-white-10 rounded-xl w-5/6 text-blue h-9 font-inter font-bold mb-4 flex flex-row justify-start items-center text-[13px]
            transition duration-100 ease-in-out  hover:bg-blue-hover hover:text-white-10 hover:font-normal hover:text-[14px] hover:opacity-95"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-line block ml-4 mr-2 "
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                 d="M0 0h24v24H0z" fill="none"/><path d="M4 19l16 0" /><path d="M4 15l4 -6l4 2l4 
                 -5l4 4" />
                </svg>
                <div class="flex-1 mr-4 font-inter font-bold text-center"> PLM SFE </div>
            </button>

            <!-- PLM LIBRARY BUTTON -->
            <button class="bg-white-10 rounded-xl w-5/6 text-blue h-9 font-inter font-bold mb-4 flex flex-row justify-start items-center text-[13px]
            transition duration-100 ease-in-out  hover:bg-blue-hover hover:text-white-10 hover:font-normal hover:text-[14px] hover:opacity-95"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books ml-4 mr-2"
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                 fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" 
                 d="M0 0h24v24H0z" fill="none"/><path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                 <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                 <path d="M5 8h4" /><path d="M9 16h4" /><path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282
                .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 
                -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" /><path d="M14 9l4 -1" />
                <path d="M16 16l3.923 -.98" /></svg> 
                <div class = "flex-1 mr-4 font-inter font-bold text-center"> PLM Library </div>
            </button>
        </div>

        <!-- Bottom Nav Bar Division--> 
        <div class = "bg-blue h-1/4 flex-col flex items-center opacity-[.99]"> 
            <!-- MAIN INSTRUCTIONS BUTTON -->
            <button  onclick="location.href='//plm.edu.ph/images/downloads/manuals/PLM_Student_Manual_v1.pdf'"class="text-white-10 rounded-xl w-5/6 bg-blue-hover h-20 font-inter font-bold mb-4 text-center text-[13px]
                             underline decoration-gold-hover underline-offset-4
                             transition duration-100 ease-in-out  hover:bg-white-10 hover:text-blue-hover hover:text-[14px] 
                             hover:no-underline hover:opacity-95" style="opacity: 1;"> 
                Student Manual
            </button>

            <!-- FAQS BUTTON -->
            <button  onclick="window.location='{{ route('faqs.get')}}'" class="text-white-10 rounded-xl w-5/6 bg-blue-hover h-20 font-inter font-bold mb-4 text-center text-[13px]
                           underline decoration-gold-hover underline-offset-4
                           transition duration-100 ease-in-out hover:bg-white-10 hover:text-blue-hover hover:text-[14px] hover:no-underline hover:opacity-95 
                           " style="opacity: 1;"> 
                FAQs
            </button>

            <!-- Inquiries Label -->
            <div class="flex mt-1 flex-col">
                <p class="ml-1 mt-24 mr-24 mb-2  text-white-10 text-[10px] font-inter align-self-end"> 
                  For more inquiries or concerns, please email: <br>
                  <b>
                    <a href="https://mail.google.com/"> 
                    <u class="hover:text-gold-hover hover:opacity-95"> ithelp@plm.edu.ph </u> 
                    </a>
                  </b>
                </p>
            </div>
        </div>
    </div>

     <!-- Button Division -->
    <div class = "h-screen flex-0 menu w-[128px] flex justify-center ml-6 mr-6" >
        <a x-on:click="nav_open = !nav_open; align = justify-center" href="#">   
            <div class = "transition duration-150 ease-in-out bg-white-10 w-16 h-16  mt-5 flex justify-center items-center rounded-lg drop-shadow-[0px_0px_3px_rgba(0,0,0,0.3)] border-0
                            hover:scale-75 hover:bg-white-10] "   >
                <img src="{{url('images/menu-icon.png')}}" class="w-6 h-5 animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1">
            </div>
        </a>
    </div>

    <!-- Main Division -->
    <div class= "flex-0 w-[920px] flex flex-col justify-center">   

        <!--PLM TITLE DIVISION-->
        <div class = "h-12 mr-7 ml-7 flex flex-row justify-start items-center mb-5">     
            <img class="h-17 w-20 mr-1 my-2  animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1"   src="{{url('images/plmlogo.png')}}">
            <div class = "leading-tight flex flex-col">
                    <h1 class="text-[24px]  font-bold font-katibeh text-[#d5a106] animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1" > 
                        PAMANTASAN NG LUNGSOD NG MAYNILA
                     </h1>
                    <h2 class="text-[13px] font-inter text-black-200 animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1" > 
                        UNIVERSITY OF THE CITY OF MANILA 
                    </h2>
            </div>
        </div>

        <!--Sign-In and Academic Calendar Division-->
        <div class = "h-88 flex flex-row justify-around mb-5">
            <!-- Log-in Division -->
            <div class ="bg-white-10 h-80 w-5/12 mt-5 rounded-lg drop-shadow-[0_4px_4px_rgba(0,0,0,0.4)] opacity-[.98] flex flex-col animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1">  
                <div class = "bg-wh h-16 flex pl-4 items-center">    
                      <h2 class="text-[20px] text-blue-hover font-bold font-inter italic"> Log-In       </h2>
                      <h2 class = "font-inter pl-2  font-semibold text-[11px] inline-block text-red"> 
                        @if(isset($error) && $error === 'invalid')
                        ( Invalid Credentials ) 
                        @endif 
                      </h2>
                </div> 
                <div class="flex-1 -mt-3">
                   <form  method ="post" class="flex flex-col h-[264px] items-start pl-9 justify-evenly"     
                        >
                    @csrf    
                    <!-- Email Input -->
                      <div class="">
                          <label class="block font-inter  text-[13px] text-gray-700 text-sm mb-[6px]" for="username">
                            Email 
                           </label>
                          <input class="shadow appearance-none border rounded h-[32px] w-72 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]"
                                 id="username" name="email" type="email" placeholder="*************@gmail.com" required>
                      </div>

                      <!-- Password Input -->
                      <div class="">
                         <label class="inline-block font-inter  text-[13px] text-gray-700 text-sm mb-[6px]" for="password">
                            Password 
                        </label>
                         <input class="shadow appearance-none border border-red-500 rounded h-[32px] w-72 py-2 px-3 text-gray-700 mb-0 leading-tight focus:outline-none focus:shadow-outline  focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]" 
                                id="password" name="password" type="password" placeholder="************" required>
                      </div>

                      <!-- Checkbox & Remember Me-->
                      <div class = " flex flex-row items-center ">
                         <input type="checkbox" class="mr-[10px] accent-blue-pressed">
                         <p class="text-red-500 text-[12px] mt-[2px] font-inter"> Keep me signed in </p>
                      </div>

                      <!-- Submit Button -->
                      <div class = "w-full" >
                        <input class="bg-blue rounded-lg cursor-pointer w-72 text-white-10 h-9 font-inter font-bold 
                                       transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95"
                                       type ="submit" value="Log-In">   
                      </div>

                      <!-- Forgot your password? -->
                      <div class="text-black-100 text-[10px] w-72 flex justify-center ">
                            <a href="{{route('reset-password.get')}}" class="transition duration-150 ease-in-out hover:font-bold hover:text-blue-pressed hover:opacity-90" > ───────   Forgot your password?   ─────── </a>
                      </div>  
                   </form>       
  
                </div>          
            </div>

            <!-- Academic Calendar Division -->
            <div class ="bg-white-10 h-80 w-5/12  mt-5 mb-[14px] rounded-lg flex flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1">  
                <div class = "h-14 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center"> 
                        <h1 class = "font-bold font-inter text-[20px] text-white-10  italic"> 
                             Academic Calendar 
                        </h1>
                </div>

                <!-- First Calendar Division -->
                <div class = "bg-white-10 h-[132px] flex flex-1 flex-row">

                    <!-- First Calendar Image -->
                    <div class = "bg-white-10 w-1/2 flex items-center justify-center p-4">
                        <a> 
                            <img onclick="showEnlargedImage('{{ url('images/calendar.png') }}')" 
                            src="{{ url('images/calendar.png') }}" 
                            class="object-scale-down h-20 mt-4 w-56 border-1 border-gold-hover hover:opacity-70 duration-75 cursor-pointer"> 
                                               </a>
                    </div>
                    
                    <!-- Enlarged Image Modal -->
                    <div id="enlargedModal" class="enlarged-image">
                        <!-- Update the color of the '×' button to white -->
                        <span class="text-white-10 text-[24px] absolute top-5 right-5 cursor-pointer" onclick="hideEnlargedImage()">&times;</span>
                        <img id="enlargedImg" src="{{ url('images/calendar.png') }}" alt="Enlarged Image">
                    </div>

                    <!-- First Calendar Label -->
                    <div class = "class = bg-white-10 w-1/2 flex flex-col justify-center pt-10 pb-8 mt-4">
                        <span class="font-inter font-bold text-blue italic">University Calendar</span> 
                        <span class="font-inter text-[11px] leading-[12px] text-blue-hover">Academic year 2023-2024</span> 
                        <span class="font-inter font-bold leading-[20px] text-[12px] text-gold">SEMESTER</span> 
                        <a onclick="showEnlargedImage('{{ url('images/calendar.png') }}')" class = "cursor-pointer font-inter text-blue leading-[30px] text-[10px] underline hover:font-bold"> Click here to enlarge image </a>
                    </div>
                </div>

                <!-- Second Calendar Division -->
                <div class = "bg-white-10 h-[132px] flex flex-row pb-6 pl-1 rounded-bl-lg rounded-br-lg ">
                    <!-- First Calendar Image -->
                    <div class = "bg-white-10 w-1/2 flex items-center justify-center p-4">
                        <a> 
                            <img onclick="showEnlargedImage('{{ url('images/calendar.png') }}')" 
                            src="{{ url('images/calendar.png') }}" 
                            class="object-scale-down h-20 mt-4 w-56 border-1 border-gold-hover hover:opacity-70 duration-75 cursor-pointer"> 
                        </a>
                    </div>
                    <!-- Second Calendar Label -->
                    <div class = "class = bg-white-10 w-1/2 flex flex-col justify-center pt-10 pb-10 rounded-bl-lg rounded-br-lg">
                        <span class="font-inter font-bold text-blue italic">University Calendar</span> 
                        <span class="font-inter text-[11px] leading-[12px] text-blue-hover">Academic year 2023-2024</span> 
                        <span class="font-inter font-bold leading-[20px] text-gold text-[12px]">TRIMESTER</span> 
                        <a onclick="showEnlargedImage('{{ url('images/calendar.png')}}')" class = "cursor-pointer font-inter text-blue leading-[30px] text-[10px] underline hover:font-bold"> Click here to enlarge image </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcement Division -->
        <div class = " flex-none flex flex-col justify-center">     
            <!-- Announcement & Events Label -->                       
            <div class = "ml-7 mr-7 text-blue-hover font-extrabold text-[24px] italic" style="-webkit-text-stroke: 1px rgba(255,255,255,0.6); "> 
                Announcement & Events 
            </div>
            <!-- Announcement 10x2 Banner Image --> 
            <div class = " cursor-pointer h-[157px] w-[855px] bg-white-10 mt-[12px] ml-7 mr-7 rounded-lg drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] opacity-100 hover:bg-black-300"> 
                <a class = "text-opacity-0 text-white-10 hover:text-opacity-100 "> 
                    <img src = "{{url('images/banner.png')}}" class="object-fill h-[157px] w-[855px] rounded-lg opacity-[0.98] hover:opacity-50 animate-[pulse_0.15s_ease-in-out_infinite]" style="animation-iteration-count: 1" > 
                    <h1 class="absolute text-[12px] text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 font-bold font-inter opacity-90
                               hover:hidden duration-200 ">
                        READ MORE ABOUT THE ARTICLE </h1>
                </a>
            </div>
        </div>

    </div>
    
</body>

<script>
    function showEnlargedImage(imageUrl) {
        var modal = document.getElementById('enlargedModal');
        var img = document.getElementById('enlargedImg');
        img.src = imageUrl;
        modal.style.display = 'flex';
    }

    function hideEnlargedImage() {
        var modal = document.getElementById('enlargedModal');
        modal.style.display = 'none';
    }
</script>
</html>

<!--  npx tailwindcss -i ./resources/css/app.css -o ./dist/app.css --watch -->