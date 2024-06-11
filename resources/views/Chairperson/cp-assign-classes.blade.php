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
    <title>Assign Classes</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <h2 class="text-2xl font-bold mb-4">Assign Classes to Instructors</h2>
            <form method="POST" action="{{ route('assign-classes.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="instructor" class="block text-sm font-medium text-gray-700">Instructor</label>
                    <select id="instructor" name="instructor_id" class="mt-1 block w-full" required>
                        @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->last_name }}, {{ $instructor->first_name
                            }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                    <select id="class" name="class_id" class="mt-1 block w-full" required>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue text-white rounded">Assign Class</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>