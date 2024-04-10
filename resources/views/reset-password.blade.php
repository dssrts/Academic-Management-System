<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{url('/images/plm-logo.png')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-end items-center h-screen font-inter" style="background-image: url('images/plm-watermark.png'); background-repeat: no-repeat;">
    <div class="rounded px-8 pt-6 pb-8 mb-4 w-80 animate-[pulse_0.25s_ease-in-out_infinite]"  style="animation-iteration-count: 1">
        <!-- Logo -->
        <a href="{{ route('sign-in.get') }}">
        <img src="{{url('images/plm-logo.png')}}" alt="Logo" class="mx-auto mb-4 w-20 h-20 duration-150 hover:w-16 hover:h-16 hover:animate-[spin_0.2s_ease-in-out_infinite] animate-[pulse_0.25s_ease-in-out_infinite]" style="animation-iteration-count: 1">
        </a>
        <h2 class="text-center text-xl font-semibold text-[20px] mb-2 text-blue ">Reset Password</h2>
        <form action="{{ route('reset-password.post') }}" method="POST">
            @csrf
            <!-- Current Email -->
            <div class="mt-4">
                <label for="current_email" class="block text-gray-700 text-sm font-bold mb-2 text-[12px]">Email</label>
                <input class="shadow appearance-none border rounded text-[12px] h-[32px] w-72 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]"
                id="current_email" name="current_email" type="email" placeholder="something@example.com" required>            
            </div>
            <!-- Current Email -->
            <div class="mt-4">
                <label for="current_email" class="block text-gray-700 text-sm font-bold mb-2 text-[12px]">Email</label>
                <input class="shadow appearance-none border rounded text-[12px] h-[32px] w-72 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]"
                id="current_student_no" name="current_student_no" type="text" placeholder="20xx-xxxxx" required>            
            </div>
            <!-- New Password -->
            <div class="mt-4">
                <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2 text-[12px]">New Password</label>
                <input class="shadow appearance-none border border-red-500 text-[12px] rounded h-[32px] w-72 py-2 px-3 text-gray-700 mb-0 leading-tight focus:outline-none focus:shadow-outline  focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]" 
                id="old_password" name="old_password" type="password" placeholder="************" required>
            </div>
            <!-- Confirm New Password -->
            <div class="mt-4">
                <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2 text-[12px]">Confirm Password</label>
                <input class="shadow appearance-none border border-red-500 text-[12px] rounded h-[32px] w-72 py-2 px-3 text-gray-700 mb-0 leading-tight focus:outline-none focus:shadow-outline  focus:border-gold-hover focus:border-[2px] focus:drop-shadow-[0_5px_5px_rgba(0,0,0,0.03)]" 
                id="new_password" name="new_password" type="password" placeholder="************" required>
            </div>
            <!-- Submit Button -->
            <div class="flex items-center justify-center mt-6">
                <input class="bg-blue rounded-lg w-full ml-12 text-white-10 h-9 font-inter font-bold 
                transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95"
                type ="submit" value="Reset Password">         
            </div>
        </form>
    </div>
    <div class="w-16 ml-12">
    </div>
</body>
</html>
