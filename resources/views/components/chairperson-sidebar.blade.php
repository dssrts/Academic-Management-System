<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{ url('/images/plm-logo.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');

        .sidebar-item {
            transition: background-color 0.3s ease;
        }

        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
    <script src="https://unpkg.com/@heroicons/react@v1.0.0/dist/outline.js" defer></script>
</head>

<body>
    <div x-data="{ isOpen: true }" class="flex h-screen " style="color:white">
        <!-- Sidebar -->
        <div :class="isOpen ? 'w-64' : 'w-16'"
            class="bg-gold h-full transition-all duration-300 overflow-hidden flex flex-col">
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

            <div class="p-4 text-center bg-gold" x-show="isOpen">
                <div class="bg-white rounded-lg p-4" style="background-color:white">
                    <p class="text-gold"><b>Welcome, </b>{{ $user->name }}!</p>
                    <p class="text-blue font-bold">{{ $departmentName }}</p>
                </div>
            </div>
            <nav class="text-white flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('cp-dashboard') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
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
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg width="24" class="h-6 w-6" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 9.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V9.4C21 9.73137 20.7314 10 20.4 10H3.6C3.26863 10 3 9.73137 3 9.4Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M14 20.4V14.6C14 14.2686 14.2686 14 14.6 14H20.4C20.7314 14 21 14.2686 21 14.6V20.4C21 20.7314 20.7314 21 20.4 21H14.6C14.2686 21 14 20.7314 14 20.4Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M3 20.4V14.6C3 14.2686 3.26863 14 3.6 14H9.4C9.73137 14 10 14.2686 10 14.6V20.4C10 20.7314 9.73137 21 9.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">Students</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('view-appeals') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M5 13l4 4L19 7M5 7h14" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Appeals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-professors') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M5 13l4 4L19 7M5 7h14" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Professors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-classes') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M5 13l4 4L19 7M5 7h14" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Classes</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="sidebar-item w-full text-left flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h2a2 2 0 002-2v-1m0-6V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v1" />
                                </svg>
                                <span class="ml-4" x-show="isOpen">Logout</span>
                            </button>
                        </form>
                    </li>
                    <!-- Add more sidebar options here -->
                </ul>
            </nav>
        </div>
    </div>
</body>
