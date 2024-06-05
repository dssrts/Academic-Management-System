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
        @import url('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');

        .flatpickr-calendar {
            position: fixed !important;
            top: 50px !important;
            right: 20px !important;
            z-index: 9999 !important;
        }

        .table-cell {
            white-space: normal;
            word-wrap: break-word;
        }

        .time-cell {
            white-space: nowrap;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite('resources/css/app.css')
    <title>View Appeals</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }}, startDate: '{{ request('start_date') }}', remarks: '{{ request('remarks') }}', open: false, appealId: null, modalRemarks: '' }"
    x-init="$watch('startDate', value => window.location.search = new URLSearchParams({start_date: value, remarks: remarks}).toString()); 
             flatpickr('#start_date', { defaultDate: startDate, onChange: function(selectedDates, dateStr, instance) { startDate = dateStr; } });">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col p-10">
            <div class="flex flex-row items-center mb-6">
                <img class="h-14 w-15 mr-4" src="{{ url('images/plm-logo.png') }}">
                <div class="leading-tight flex flex-col">
                    <h1 class="text-[20px] font-bold font-katibeh text-[#d5a106]">PAMANTASAN NG LUNGSOD NG MAYNILA</h1>
                    <h2 class="text-[10px] font-inter text-black-200">UNIVERSITY OF THE CITY OF MANILA</h2>
                </div>
            </div>
            <div>
                <h1 class="text-[18px] mb-4 font-bold">Student Requests</h1>

     <!-- Filter Form -->
<form method="GET" class="mb-4 flex space-x-4" @submit.prevent>
    <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="text" name="start_date" id="start_date" class="mt-1 block w-full" x-model="startDate">
    </div>
    <div>
        <label for="remarks" class="block text-sm font-medium">Remarks</label>
        <select name="remarks" id="remarks" class="appearance-none mt-1 block w-full bg-white-10 text-gray-700" x-model="remarks"
                @change="window.location.search = new URLSearchParams({start_date: startDate, remarks: remarks}).toString()">
            <option value="" class="bg-white-10">All</option>
            <option value="remarked" class="bg-white-10 " :selected="remarks == 'remarked'">Remarked</option>
            <option value="not_done" class="bg-white-10" :selected="remarks == 'not_done'">Not Done</option>
        </select>
    </div>
</form>

                <!-- Appeals Table -->
                <div class="mt-6 bg-white rounded-lg shadow-md p-6 overflow-x-auto" style="color:black; background-color:white">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gold text-white-10">
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300">Student ID</th>
                                <th class="py-2 px-4 border-b border-gray-300">PLM Email</th>
                                <th class="py-2 px-4 border-b border-gray-300">Subject</th>
                                <th class="py-2 px-4 border-b border-gray-300">Message</th>
                                <th class="py-2 px-4 border-b border-gray-300">Attachment</th>
                                <th class="py-2 px-4 border-b border-gray-300">Remarks</th>
                                <th class="py-2 px-4 border-b border-gray-300 time-cell">Time</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($appeals as $appeal)
                            <tr class="bg-white cursor-pointer hover:opacity-50" @click="open = true; appealId = {{ $appeal->id }}; modalRemarks = '{{ $appeal->remarks }}'">
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->student_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $appeal->student->plm_email }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 table-cell">{{ $appeal->subject }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 table-cell">{{ $appeal->message }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if($appeal->filepath)
                                    <a href="{{ asset('' . $appeal->filepath) }}" class="text-blue hover:underline" target="_blank">View File</a>
                                    @else
                                    No File
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300 table-cell">{{ $appeal->remarks ?? 'Not Done' }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 time-cell">{{ \Carbon\Carbon::parse($appeal->created_at)->format('F j, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $appeals->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white-10  rounded-lg shadow-xl border-gold border-2 p-6 w-1/2" @click.away="open = false">
            <h2 class="text-xl font-bold mb-4 text-gold ">Enter Remarks</h2>
            <form @submit.prevent="saveRemarks">
                <textarea class="w-full p-2 border rounded" x-model="modalRemarks" placeholder="Enter your remarks here"></textarea>
                <div class="mt-4 flex justify-end">
                    <button type="button" class="bg-gold text-white-10 px-4 py-2 rounded mr-2" @click="open = false">Cancel</button>
                    <button type="submit" class="bg-gold text-white-10 px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function saveRemarks() {
            fetch('/save-remarks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    appeal_id: this.appealId,
                    remarks: this.modalRemarks
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close the modal
                    this.open = false;
                    // Optionally, refresh the page or update the table row with the new remarks
                    location.reload();
                } else {
                    alert('Failed to save remarks. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save remarks. Please try again.');
            });
        }
    </script>

</body>

</html>
