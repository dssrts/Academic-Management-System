<div x-data="{ isOpen: true }" class="flex">
    <!-- Toggle Button -->
    <button @click="isOpen = !isOpen" class="p-2 bg-gray-800 text-white focus:outline-none">
        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div :class="isOpen ? 'w-64' : 'w-0'" class="bg-blue h-screen transition-width duration-300 overflow-hidden flex flex-col">
        <div class="text-white p-4" style="color: azure;">
            <h1 class="text-2xl font-bold">Chairperson Dashboard</h1>
        </div>
        <nav class="text-white flex-1" style="color: azure;">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('cp-dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('view-students') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">View Students</a>
                </li>
                <!-- Add more sidebar options here -->
            </ul>
        </nav>
    </div>
</div>
