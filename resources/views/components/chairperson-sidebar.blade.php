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

<div x-data="{ isOpen: true }" class="flex h-screen" style="color:white">
    <!-- Sidebar -->
    <div :class="isOpen ? 'w-64' : 'w-16'"
        class="bg-blue h-full transition-all duration-300 overflow-hidden flex flex-col">
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

        <img src="{{ url('images/plm-logo.png') }}" alt="PLM Logo" class="mx-auto mb-2"
            style="width: 100px; height: 100px;" x-show="isOpen">

        <div class="p-4 text-center" style="color:rgb(45, 52, 154); " x-show="isOpen">
            <div class="bg-white rounded-lg p-4" style="background-color:white">
                <p class="text-blue-800 font-bold">{{ $user->name }}</p>
                <p class="text-blue-600">{{ $departmentName }}</p>
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View Students</span>
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
                    <a href="{{ route('view-appeals') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View SFE</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view-appeals') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 13l4 4L19 7M5 7h14" />
                        </svg>
                        <span class="ml-4" x-show="isOpen">View Schedules</span>
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