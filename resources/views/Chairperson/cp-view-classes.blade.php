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
    x-data="{ btns: {{ json_encode($btns) }} }">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar :btns="$btns" :user="$user" />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">Classes</h2>
            </div>
            <form method="GET" action="{{ route('view-classes') }}">
                <input type="text" name="search" placeholder="Search by code, name, or room..."
                    class="px-3 py-2 mb-4 border rounded w-full" value="{{ request('search') }}">
            </form>
            <div class="bg-white rounded-lg p-6 shadow-lg" style="background-color:white">
                {{-- <h3 class="text-2xl font-semibold mb-4">List of Classes</h3> --}}

                @if($classes->isEmpty())
                <p>No classes found.</p>
                @else
                <table class="w-full table-auto">
                    <thead class="bg-blue" style="color:white">
                        <tr>
                            <th class="px-4 py-2">Code</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Units</th>
                            {{-- <th class="px-4 py-2">Day</th> --}}
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
                        <tr>
                            <td class="border px-4 py-2">{{ $class->code }}</td>
                            <td class="border px-4 py-2">{{ $class->name }}</td>
                            <td class="border px-4 py-2">{{ $class->description }}</td>
                            <td class="border px-4 py-2">{{ $class->units }}</td>
                            {{-- <td class="border px-4 py-2">{{ $class->day }}</td> --}}
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
                                        <option value="{{ $professor->id }}" {{ $class->professor_id == $professor->id ?
                                            'selected' : '' }}>
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
</body>

</html>