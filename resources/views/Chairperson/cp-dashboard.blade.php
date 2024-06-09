<!DOCTYPE html>
<html lang="en">

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
</head>

<style>
    #info {
        color: #2D349A;
        display: flex;
        flex-direction: column;
        height: max-content;
        margin-top: 8rem;
        margin-left: 2rem;
        background-color: white;

        padding: 2rem;
        border: 1px solid #ccc;
        border-radius: 12.3px;
        /* Optional: to make the box visible */
    }

    #info-text {
        font-size: 1.5rem;
        color: white;
        padding: 10px;
        padding-right: 5rem;
        border: 1px solid #ccc;
        background-color: #2C56A6;
        border-radius: 10.26px;

    }

    #box-title {}
</style>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }} }">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />
        <!-- Main Content -->
        <div id="info">
            <span class="font-bold mb-3">Department:</span>
            <div id="info-text">
                <span class="font-bold">{{ $program }}</span>
            </div>
        </div>
        {{-- <div class="flex-1 flex flex-col p-10" style="margin-top:5rem">
            <div class="flex flex-row items-center mb-6">
                <img class="h-14 w-15 mr-4" src="{{ url('images/plm-logo.png') }}">
                <div class="leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]">PAMANTASAN NG LUNGSOD NG MAYNILA</h1>
                    <h2 class="text-[10px] font-inter text-black-200">UNIVERSITY OF THE CITY OF MANILA</h2>
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold">Welcome, Chairperson</h2>
                <p class="mt-4">This is your dashboard. You can view and manage students from here.</p>
                <!-- Add more content here -->
            </div>
        </div> --}}
    </div>
</body>

</html>