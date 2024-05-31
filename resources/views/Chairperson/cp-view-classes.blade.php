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
    <title>Classes</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ isModalOpen: false, btns: {{ json_encode($btns) }} }">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar :btns="$btns" :user="$user" />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <!-- Header Section -->
            <div class="flex flex-row items-center mb-6">
                <img class="h-14 w-15 mr-4" src="{{ url('images/plm-logo.png') }}">
                <div class="leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]">PAMANTASAN NG LUNGSOD NG MAYNILA</h1>
                    <h2 class="text-[10px] font-inter text-black-200">UNIVERSITY OF THE CITY OF MANILA</h2>
                </div>
            </div>

            <!-- Content Section -->
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold">Classes</h2>
                    <button class="ml-2 px-4 py-2 bg-gold text-white rounded-lg" style="color:white"
                        @click="isModalOpen = true">Add Class</button>
                </div>
                <form method="GET" action="{{ route('view-classes') }}">
                    <input type="text" name="search" placeholder="Search by code, name, or room..."
                        class="px-3 py-2 mb-4 border rounded w-full" value="{{ request('search') }}">
                </form>
                <div class="bg-white rounded-lg p-6 shadow-lg" style="background-color:white">
                    @if($classes->isEmpty())
                    <p>No classes found.</p>
                    @else
                    <table class="w-full table-auto">
                        <thead class="bg-gold" style="color:white">
                            <tr>
                                <th class="px-4 py-2">Code</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Units</th>
                                <th class="px-4 py-2">Start Time</th>
                                <th class="px-4 py-2">End Time</th>
                                <th class="px-4 py-2">Building</th>
                                <th class="px-4 py-2">Room</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Professor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr class="cursor-pointer"
                                onclick="window.location='{{ route('edit-class', $class->id) }}'">
                                <td class="border px-4 py-2">{{ $class->code }}</td>
                                <td class="border px-4 py-2">{{ $class->name }}</td>
                                <td class="border px-4 py-2">{{ $class->description }}</td>
                                <td class="border px-4 py-2">{{ $class->units }}</td>
                                <td class="border px-4 py-2">{{ $class->start_time }}</td>
                                <td class="border px-4 py-2">{{ $class->end_time }}</td>
                                <td class="border px-4 py-2">{{ $class->building }}</td>
                                <td class="border px-4 py-2">{{ $class->room }}</td>
                                <td class="border px-4 py-2">{{ $class->type }}</td>
                                <td class="border px-4 py-2">
                                    <form method="POST" action="{{ route('update-class-professor', $class->id) }}">
                                        @csrf
                                        <select name="professor_id" onchange="this.form.submit()"
                                            class="form-select block w-full mt-1">
                                            @foreach($professors as $professor)
                                            <option value="{{ $professor->id }}" {{ $class->professor_id ==
                                                $professor->id ? 'selected' : '' }}>
                                                {{ $professor->first_name }} {{ $professor->last_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $classes->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding a class -->
    <div x-show="isModalOpen" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-600 opacity-50"></div>
        <div class="bg-white rounded-lg p-6 shadow-lg max-w-4xl w-full mx-4 overflow-y-auto max-h-full z-50"
            style="background-color:white">
            <h2 class="text-2xl font-bold mb-4">Add Class</h2>
            <form method="POST" action="{{ route('create-class') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                <div class="mb-4">
                    <label for="code" class="block text-sm font-bold mb-2">Code</label>
                    <input type="text" name="code" id="code" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="section" class="block text-sm font-bold mb-2">Section</label>
                    <input type="number" name="section" id="section" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4 md:col-span-2">
                    <label for="description" class="block text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" class="block w-full mt-1 border rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label for="units" class="block text-sm font-bold mb-2">Units</label>
                    <input type="number" name="units" id="units" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="day" class="block text-sm font-bold mb-2">Day</label>
                    <input type="text" name="day" id="day" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-sm font-bold mb-2">Start Time</label>
                    <input type="time" name="start_time" id="start_time" class="block w-full mt-1 border rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-sm font-bold mb-2">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="building" class="block text-sm font-bold mb-2">Building</label>
                    <input type="text" name="building" id="building" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="room" class="block text-sm font-bold mb-2">Room</label>
                    <input type="text" name="room" id="room" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-bold mb-2">Type</label>
                    <input type="text" name="type" id="type" class="block w-full mt-1 border rounded" required>
                </div>
                <div class="mb-4 md:col-span-2">
                    <label for="professor_id" class="block text-sm font-bold mb-2">Professor</label>
                    <select name="professor_id" id="professor_id" class="block w-full mt-1 border rounded">
                        <option value="">-- Select Professor --</option>
                        @foreach($professors as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->first_name }} {{ $professor->last_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end md:col-span-2">
                    <button type="button" @click="isModalOpen = false"
                        class="px-4 py-2 text-white rounded mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-gold text-white rounded" style="color:white">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>