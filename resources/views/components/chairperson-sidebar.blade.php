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
    @vite('resources/css/app.css')
    <title>CRS</title>
    <script src="https://unpkg.com/@heroicons/react@v1.0.0/dist/outline.js" defer></script>
</head>

<div x-data="{ isOpen: true }" class="flex h-screen " style="color:white">
    <!-- Sidebar -->
    <div :class="isOpen ? 'w-64' : 'w-16'"
        class=" bg-gold h-full transition-all duration-300 overflow-hidden flex flex-col">
        <!-- Toggle Button -->
        <button @click="isOpen = !isOpen" class="p-2 text-white focus:outline-none self-end">
            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <div class="bg-white rounded-lg p-4 text-center">
            <p class="text-white font-bold">Chairperson AMS</p>

        </div>
        <img src="{{ url('images/user.png') }}" alt="user" class="mx-auto mb-2" style="width: 70px; height: 70px;"
            x-show="isOpen">

        <div class="p-4 text-center bg-gold" " x-show=" isOpen">
            <div class="bg-white rounded-lg p-4" style="background-color:white">
                <p class="text-gold"><b>Welcome, </b>{{ $user->name }}!</p>
                <p class="text-blue font-bold">{{ $departmentName }}</p>
            </div>
        </div>
        <nav class="text-white flex-1">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('cp-dashboard') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view-students') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-6 w-6">
                            <path
                                d="M8 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM3.156 11.763c.16-.629.44-1.21.813-1.72a2.5 2.5 0 0 0-2.725 1.377c-.136.287.102.58.418.58h1.449c.01-.077.025-.156.045-.237ZM12.847 11.763c.02.08.036.16.046.237h1.446c.316 0 .554-.293.417-.579a2.5 2.5 0 0 0-2.722-1.378c.374.51.653 1.09.813 1.72ZM14 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM5 13c-.552 0-1.013-.455-.876-.99a4.002 4.002 0 0 1 7.753 0c.136.535-.324.99-.877.99H5Z" />
                        </svg>


                        <span class="ml-4" x-show="isOpen">Students</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('view-appeals') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View Appeals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view-professors') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View Professors</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view-classes') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" ">
                        <svg xmlns=" http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View Classes</span>
                    </a>
                </li>

                <!-- Add more sidebar options here -->
            </ul>
        </nav>
        <div class="mt-auto p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h2a2 2 0 002-2v-1m0-6V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v1" />
                    </svg>
                    <span class="ml-4" x-show="isOpen">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>