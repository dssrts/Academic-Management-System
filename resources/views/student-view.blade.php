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
    <title>CRS</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class  = "w-screen h-screen  flex flex-row">

        <!-- Nav Division -->
        <nav class = "h-screen w-1/5 bg-blue flex flex-col">

            <div class = "bg-blue flex flex-col justify-center items-center py-4 pb-3 gap-2">
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
                    <h2 class = "font-inter text-blue text-[12px]"> <b> Welcome, </b> Student! </h2>
                    <h2 class = "font-inter font-bold text-blue text-[12px] leading-[10px]"> 2021-xxxx </h2>
                    <h2 class = "font-inter  text-gold-hover italic text-[12px]">  Undergraduate </h2>
                 </div>
            </div>

            <div class = "bg-blue flex flex-col  font-inter">

                <div class = "bg-blue flex flex-row gap-5 items-center justify-start pb-2 py-2 pl-5 text-[15px] text-white-10 hover:bg-blue-hover ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-user-plus" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                       fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                       <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" />
                       <path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                       <h1 class = "">Registration</h1>
                </div>

                <div class = "hidden">

                    <div class = "bg-blue flex flex-row gap-5 pl-16 py-1 pb-1 text-[13px] text-white-10 hover:bg-blue-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Information
                    </div>

                    <div class = "bg-blue flex flex-row gap-5 pl-16 py-1 pb-1 text-[13px] text-white-10 hover:bg-blue-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Assessment
                    </div>

                    <div class = "bg-blue  flex flex-row gap-5 pl-16 py-1 pb-1 text-[13px] text-white-10 hover:bg-blue-hover ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            Register
                    </div>

                    <div class = "bg-blue flex flex-row gap-5 pl-16 py-1 pb-1 text-[13px] text-white-10 hover:bg-blue-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right hidden" width="18
                        " height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                            View Registration <br> Form
                    </div>
                </div>

                <div class = "bg-blue  flex flex-row gap-5 pl-5 py-2 pb-2 text-[15px] text-white-10 hover:bg-blue-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-info h" width="24" height="24" 
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <path d="M11 14h1v4h1" /><path d="M12 11h.01" /></svg>
                            View Information
                </div>

                <div class = "bg-blue  flex flex-row gap-5 justify-start pl-5 py-2 pb-2 text-[15px] text-white-10 items-center hover:bg-blue-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                       d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" />
                       <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                        Process Infromation <br> Student
                </div>

                <div class = "bg-blue  flex flex-row gap-5 justify-start pl-5 py-2 pb-2 text-[15px] text-white-10 items-center hover:bg-blue-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chalkboard" width="24" height="24" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                    <path d="M11 16m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>

                        Go to Classroom
                </div>

                <div class = "bg-blue  flex flex-row gap-5 justify-start pl-5 py-2 pb-2 text-[15px] text-white-10 items-center hover:bg-blue-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                     fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"
                     fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        Student Services
                </div>

                <div class = "bg-blue  flex flex-row gap-5 justify-start pl-5 py-2 pb-2  text-[15px] text-white-10 items-center hover:bg-blue-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" 
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                    stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                        Log-Out
                </div>
                
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
        <div class = "flex flex-col flex-1 bg-gold-hover">
            <!--PLM TITLE DIVISION-->
            <div class = "h-12 mr-7 ml-7 flex flex-row justify-start items-center">
                <img class="h-14 w-15 mr-1 my-2" src="{{url('images/plmlogo.png')}}">
                <div class = "leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]"> PAMANTASAN NG LUNGSOD NG MAYNILA </h1>
                    <h2 class="text-[10px] font-inter text-black-200"> UNIVERSITYS OF THE CITY OF MANILA </h2>
                </div>
            </div>

            <div>

            </div>
        </div>
    </div>
</body>
</html>