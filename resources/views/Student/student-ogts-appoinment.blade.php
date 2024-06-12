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
                
                <!-- Buttons above main content on the right -->
                <div class="flex justify-end w-full mb-0 space-x-2">
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">Student Manual</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">PLM Library</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">PLM Website</button>
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
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">OGTS System</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">OSDS System</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>