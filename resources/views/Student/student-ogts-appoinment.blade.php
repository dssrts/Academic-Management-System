<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .scrollable-content {
            overflow-y: auto;
            max-height: calc(100vh - 80px); /* Adjust based on header height */
        }
    </style>
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')
        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Student Services'])

            <!-- Main content -->
            <div class="flex-1 flex flex-col items-center justify-center p-2 overflow-hidden">
                <!-- Back button -->
                <div class="w-full flex justify-start mb-2">
                    <a href="{{ url('/student-services') }}" class="bg-blue text-white-10 hover:bg-blue-hover text-gray-700 font-bold py-1 px-3 rounded inline-flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </a>
                </div>
                
                <div class="flex justify-end w-full mb-0 mr-2 space-x-2">
                    <a href="https://plm.edu.ph/images/downloads/manuals/PLM_Student_Manual_v1.pdf" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3  bi bi-file-earmark-person" viewBox="0 0 16 16">
                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z"/>
                          </svg>
                        Student Manual
                    </a>
                    <a href="https://library.plm.edu.ph/" class="mr-2 flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3  bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                          </svg>
                        PLM Library
                    </a>
                    <a href="https://plm.edu.ph/" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
                          </svg>
                        PLM Website
                    </a>
                </div>
                

                <!-- Main content -->
                <div class="flex-1 p-4 overflow-hidden w-full max-w-[750px]">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M14.348 14.849l-3.849-3.849-3.849 3.849-1.402-1.402 3.849-3.849-3.849-3.849 1.402-1.402 3.849 3.849 3.849-3.849 1.402 1.402-3.849 3.849 3.849 3.849z"/>
                                </svg>
                            </span>
                        </div>
                    @endif
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">BOOK AN APPOINMENT WITH OGTS</h1>
                    </div>
                    <div class="pr-8 pl-8 pb-8 pt-4 font-inter text-[14px] bg-white-10">
                        <form action="{{ route('ogts.booking.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="plmemail" class="block text-[12px] font-bold text-black-300">
                                    Your PLM Outlook Email:
                                </label>
                                <input type="email" id="plmemail" name="plmemail"
                                    class="pl-2 h-5 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                    block w-full shadow-sm sm:text-[12px] border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="recipientemail" class="block text-[12px] font-bold text-black-300">
                                    Send to:
                                </label>
                                <input type="email" id="recipientemail" name="recipientemail" value="ogts_services@plm.edu.ph"
                                    class="pl-2 h-5 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                    block w-full shadow-sm sm:text-[12px] border-gray-300 rounded-md text-gold-amber font-bold"
                                    readonly>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="block text-[12px] font-bold text-black-300">
                                    Subject:
                                </label>
                                <input type="text" id="subject" name="subject"
                                    class="pl-2 h-5 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                    block w-full shadow-sm sm:text-[12px] border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="block text-[12px] font-bold text-black-300">
                                    Message:
                                </label>
                                <textarea id="message" name="message" rows="4" placeholder="Enter Something..."
                                    class="p-2 h-[92px] bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[12px] border-gray-300 rounded-md"
                                    required></textarea>
                            </div>
                            <div class="flex justify-center mt-4">
                                <button type="submit"
                                    class="bg-blue px-4 py-2 w-36 h-9 text-center rounded-xl text-[13px] font-inter font-semibold text-white-10 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95">
                                    Book
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="flex space-x-2 mt-2">
                    <a href="#" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-house-gear" viewBox="0 0 16 16">
                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/>
                            <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                          </svg>
                        OGTS System
                    </a>
                    <a href="#" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                          </svg>
                        OSDS System
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>