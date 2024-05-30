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
    <title>Professors</title>
</head>
<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover" x-data="{ btns: {{ json_encode($btns) }} }">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar :btns="$btns" :user="$user" />

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">List of Professors in your College</h2>
            </div>
            <div class="bg-white rounded-lg p-6 mt-6 shadow-lg" style="background-color:white">
                {{-- <h3 class="text-2xl font-semibold mb-4">List of Professors</h3> --}}
                @if($professors->isEmpty())
                    <p>No professors found.</p>
                @else
                    <table class="w-full table-auto">
                        <thead class="bg-blue" style="color:white">
                            <tr>
                                <th class="px-4 py-2">Last Name</th>
                                <th class="px-4 py-2">First Name</th>
                                <th class="px-4 py-2">Middle Name</th>
                                <th class="px-4 py-2">Pronouns</th>
                                <th class="px-4 py-2">PLM Email</th>
                                <th class="px-4 py-2">College</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($professors as $professor)
                                <tr>
                                    <td class="border px-4 py-2">{{ $professor->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $professor->first_name }}</td>
                                    <td class="border px-4 py-2">{{ $professor->middle_name }}</td>
                                    <td class="border px-4 py-2">{{ $professor->pronouns }}</td>
                                    <td class="border px-4 py-2">{{ $professor->plm_email }}</td>
                                    <td class="border px-4 py-2">{{ $professor->college->Code }}</td> <!-- Assuming there is a relationship setup -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $professors->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
