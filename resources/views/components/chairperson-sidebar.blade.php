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
            margin-top: 4rem;
            /* Adjust this value as needed */
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
    <script src="https://unpkg.com/@heroicons/react@v1.0.0/dist/outline.js" defer></script>
</head>

<body>


    <nav class="bg-white-10 border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ url('/images/plm-logo.png') }}" class="h-8" alt="PLM Logo" />
                <span class="self-center font-bold whitespace-nowrap dark:text-blue" style="font-size: 1.5rem;">PLM
                    AMS</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                </ul>
            </div>
        </div>
    </nav>

    <div x-data="{ isOpen: true }" class="flex h-screen content" style="color:white">
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
            <div class="bg-white rounded-lg p-4 text-center">
                <p class="text-white font-bold">Chairperson AMS</p>
            </div>
            <img src="{{ url('images/user.png') }}" alt="user" class="mx-auto mb-2" style="width: 70px; height: 70px;"
                x-show="isOpen">

            <div class="p-4 text-center bg-blue" x-show="isOpen">
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
                            <svg class="h-6 w-6" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m1750.588 1750.118h-1581.176c-31.172 0-56.47-25.412-56.47-56.47v-295.568l210.183 126.155h1273.75l210.184-126.155v295.567c0 31.059-25.299 56.47-56.47 56.47zm-1298.823-338.824v-1242.353h1016.47v1242.353zm1298.823-677.647h-169.412v-677.647h-1242.352v677.647h-169.412c-93.403 0-169.412 76.01-169.412 169.413v790.588c0 93.402 76.01 169.412 169.412 169.412h1581.176c93.403 0 169.412-76.01 169.412-169.412v-790.588c0-93.403-76.01-169.412-169.412-169.412zm-1129.412-244.743h564.706v-112.942h-564.706zm0 677.647h564.706v-112.942h-564.706zm0-338.824h677.648v-112.941h-677.648z"
                                    fill-rule="evenodd" fill="#fff" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Appeals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-professors') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg fill="#fff" class="h-6 w-6" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" stroke="#fff"
                                    d="m5 4h-1v1 25 1h1 25v-2h-24v-23h29v4h2v-5-1h-1zm31 13c1.6569 0 3-1.3431 3-3s-1.3431-3-3-3-3 1.3431-3 3 1.3431 3 3 3zm-2.0867 2.0088c-.0366 0-.0729.0006-.109.0019h-1.8043c-.4557 0-.8866.2072-1.1713.563l-3.5496 4.437h-5.2791c-.8284 0-1.5.6716-1.5 1.5 0 .8285.6716 1.5 1.5 1.5h6c.4557 0 .8866-.2071 1.1713-.5629l1.9118-2.3898v17.8348c0 .899.7356 1.6346 1.6346 1.6346s1.6346-.7356 1.6346-1.6346v-8.1728h3.2691v8.1728c0 .899.7356 1.6346 1.6346 1.6346s1.6346-.7356 1.6346-1.6346v-12.1486c.899 0 3.675-1.7112 3.675-5.9249 0-3.1759-2.776-4.8105-3.675-4.8105z"
                                    fill="#fff" fill-rule="evenodd" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Professors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-classes') }}"
                            class="sidebar-item flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                            <span class="ml-4" x-show="isOpen">View Classes</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="sidebar-item w-full text-left flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                                <svg fill="none" viewBox="0 0 48 48" class="h-6 w-6"
                                    xmlns=" http://www.w3.org/2000/svg">
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
                    </li>
                    <!-- Add more sidebar options here -->
                </ul>
            </nav>
        </div>
        <div class="flex-1">
            <!-- Main content goes here -->
        </div>
    </div>
</body>