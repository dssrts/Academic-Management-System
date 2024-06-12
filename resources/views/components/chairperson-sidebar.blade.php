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

        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 1rem;
            width: 100%;
            text-align: center;
            display: flex;
            align-items: left;
            justify-content: left;
            z-index: 10;
            position: fixed;
            top: 0;
            left: 0;
        }

        .navbar img {
            margin-left: 20px;
            margin-right: 10px;
        }

        .content {
            margin-top: 4.5rem;
            /* Adjust this value as needed */
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
    <script src="https://unpkg.com/@heroicons/react@v1.0.0/dist/outline.js" defer></script>
</head>

<body>
    <nav class="navbar">
        <img src="{{ url('/images/plm-logo.png') }}" alt="PLM Logo" style="width: 40px; height:40px">
        <span class="text-blue" style="font-weight: bold; font-size: 1.5em">PLM AMS</span>
    </nav>
    <div x-data="{ isOpen: true }" class="flex content" style="color:white">
        <!-- Sidebar -->
        <div :class="isOpen ? 'w-64' : 'w-16'"
            class="bg-blue h-full transition-all duration-300 overflow-hidden flex flex-col">
            <!-- Toggle Button -->
            {{-- <button @click="isOpen = !isOpen" class="p-2 text-white focus:outline-none self-end">
                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button> --}}


            <nav class="text-white flex-1" style="margin-top: 0.5rem">
                <ul class="space-y-2" style="padding-left: 1rem;padding-right:1rem">
                    <li>
                        <a href="{{ route('cp-dashboard') }} "
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Department</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-students') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Students</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('view-appeals') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Concerns</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-professors') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Professors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-classes') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Classes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('assign-classes.form') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Teaching Assignment</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('send-email.form') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                            </svg>

                            <span class="ml-4" x-show="isOpen">Laboratory/Room Report</span>
                        </a>
                    </li>

                    <!-- Add more sidebar options here -->
                </ul>
            </nav>
            <div class="mt-auto mb-4 px-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="sidebar-item w-full text-left flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg fill="none" viewBox="0 0 48 48" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                            <path d="m0 0h48v48h-48z" fill="none" fill-opacity=".01" />
                            <g stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                <path d="m23.9917 6h-17.9917v36h18" />
                                <path d="m33 33 9-9-9-9" />
                                <path d="m16 23.9917h26" />
                            </g>
                        </svg>
                        <span class="ml-4" x-show="isOpen">Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex-1">
            <!-- Main content goes here -->
        </div>
    </div>
</body>