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
    <title>Edit Class</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">Edit Class</h2>
                <button onclick="history.back()" class="px-4 py-2 bg-gold text-black rounded-lg"
                    style="color:white">Back</button>
            </div>
            <div class="bg-white rounded-lg p-6 mt-6 shadow-lg h-4/5 overflow-y-auto" style="background-color:white">
                <form method="POST" action="{{ route('update-class', $class) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="code" class="block text-sm font-bold mb-2">Code</label>
                        <input type="text" name="code" id="code" class="block w-full mt-1 border rounded"
                            value="{{ $class->code }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="section" class="block text-sm font-bold mb-2">Section</label>
                        <input type="number" name="section" id="section" class="block w-full mt-1 border rounded"
                            value="{{ $class->section }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" class="block w-full mt-1 border rounded"
                            value="{{ $class->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description"
                            class="block w-full mt-1 border rounded">{{ $class->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="units" class="block text-sm font-bold mb-2">Units</label>
                        <input type="number" name="units" id="units" class="block w-full mt-1 border rounded"
                            value="{{ $class->units }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="day" class="block text-sm font-bold mb-2">Day</label>
                        <input type="text" name="day" id="day" class="block w-full mt-1 border rounded"
                            value="{{ $class->day }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-sm font-bold mb-2">Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="block w-full mt-1 border rounded"
                            value="{{ $class->start_time }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-sm font-bold mb-2">End Time</label>
                        <input type="time" name="end_time" id="end_time" class="block w-full mt-1 border rounded"
                            value="{{ $class->end_time }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="building" class="block text-sm font-bold mb-2">Building</label>
                        <input type="text" name="building" id="building" class="block w-full mt-1 border rounded"
                            value="{{ $class->building }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="room" class="block text-sm font-bold mb-2">Room</label>
                        <input type="text" name="room" id="room" class="block w-full mt-1 border rounded"
                            value="{{ $class->room }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-bold mb-2">Type</label>
                        <input type="text" name="type" id="type" class="block w-full mt-1 border rounded"
                            value="{{ $class->type }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="professor_id" class="block text-sm font-bold mb-2">Professor</label>
                        <select name="professor_id" id="professor_id" class="block w-full mt-1 border rounded">
                            <option value="">-- Select Professor --</option>
                            @foreach($professors as $professor)
                            <option value="{{ $professor->id }}" @if($class->professor_id == $professor->id) selected
                                @endif>
                                {{ $professor->first_name }} {{ $professor->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="history.back()"
                            class="px-4 py-2 text-white rounded mr-2">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-gold text-white rounded"
                            style="color:white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>