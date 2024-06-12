<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Ensure the dropdown appears below the input field */
        select#recipientemail {
            max-height: 200px; /* Set maximum height */
            overflow-y: auto;  /* Enable vertical scrolling */
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Submit Concern'])

            <!-- Main content -->
            <div class="flex-1 p-10 overflow-hidden flex justify-center items-center">
                <div class="bg-white-10 h-10/12 w-2/3 rounded-xl flex-col drop-shadow-[0_3px_3px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="h-16 bg-blue rounded-tr-lg rounded-tl-lg flex justify-center items-center">
                        <h1 class="font-bold font-inter text-[20px] text-white-10 italic">SUBMIT CONCERNS</h1>
                    </div>
                    <div class="p-8 font-inter text-[14px]">
                        <form action="{{ route('student.concerns.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="studentnumber" class="block text-sm font-bold text-gray-700">
                                    Student Number
                                </label>
                                <input type="text" id="studentnumber" name="studentnumber" value="{{ $student_no }}"
                                    class="pl-2 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 
                                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="recipientemail" class="block text-sm font-bold text-gray-700">
                                    Recipient Email
                                </label>
                                <select id="recipientemail" name="recipientemail"
                                    class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-bold text-gray-700">
                                    Subject
                                </label>
                                <select id="subject" name="subject"
                                    class="pl-1 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="Academic Performance Concerns">Academic Performance Concerns</option>
                                    <option value="Course Grade Concerns">Course Grade Concerns</option>
                                    <option value="Leave of Absence Request (LOA)">Leave of Absence Request (LOA)</option>
                                    <option value="Class Schedule Conflicts">Class Schedule Conflicts</option>
                                    <option value="Scholarship Compliance">Scholarship Compliance</option>
                                    <option value="Technology Access Concerns">Technology Access Concerns</option>
                                    <option value="Request for Transcript of Records (TOR)">Request for Transcript of Records(TOR)</option>
                                    <option value="Library Resource Accessibility">Library Resource Accessibility</option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Enrollment Issues">Enrollment Issues</option>
                                    <option value="Internship Concerns">Internship Concerns</option>
                                    <option value="Proposal for Research Funding">Proposal for Research Funding</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-sm font-bold text-gray-700">
                                    Message
                                </label>
                                <textarea id="message" name="message" rows="4" placeholder="Enter Something..."
                                    class="p-2 h-36 bg-blue-hover bg-opacity-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                            </div>
                            <div class="mb-4 justify-center flex">
                                <input type="file" placeholder=".pdf only" name="pdf_file"
                                    class="font-inter block mr-1 text-[12px] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <p class="font-inter mt-2 mr-8 text-[11px] text-gray-500 dark:text-gray-200" id="file_input_help">.pdf (max 2 mb)</p>
                                <input type="submit"
                                    class="bg-blue px-3 w-1/5 text-center rounded-2xl text-[13px] font-inter font-semibold text-white-10 h-5 mt-1 pb-1 transition duration-150 ease-in-out hover:bg-blue-hover hover:drop-shadow-[0_3px_3px_rgba(0,0,0,0.05)] hover:opacity-95"
                                    value="Submit">
                                @if (isset($send) && $send === 'success')
                                    <svg height="20px" class="ml-4 mr-2 mt-[3px]" version="1.1"
                                        viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title />
                                        <desc />
                                        <defs />
                                        <g fill="none" fill-rule="evenodd" id="Page-1" stroke=""
                                            stroke-width="1">
                                            <g fill="#378805" id="Core"
                                                transform="translate(-128.000000, -86.000000)">
                                                <g id="check-circle-outline"
                                                    transform="translate(128.000000, 86.000000)">
                                                    <path
                                                        d="M5.9,8.1 L4.5,9.5 L9,14 L19,4 L17.6,2.6 L9,11.2 L5.9,8.1 L5.9,8.1 Z M18,10 C18,14.4 14.4,18 10,18 C5.6,18 2,14.4 2,10 C2,5.6 5.6,2 10,2 C10.8,2 11.5,2.1 12.2,2.3 L13.8,0.7 C12.6,0.3 11.3,0 10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 L18,10 L18,10 Z"
                                                        id="Shape" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="font-inter mt-1 text-[12px] text-green font-semibold" id="file_input_help">
                                        Sent
                                    </p>
                                @elseif (isset($send) && $send === 'error')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        class="ml-4 mr-2 mt-[3px]" fill="#E63049" class="bi bi-x-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                    <p class="font-inter mt-1 text-sm text-red font-semibold" id="file_input_help">
                                        Request Error
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subjectSelect = document.getElementById('subject');
            const recipientEmailSelect = document.getElementById('recipientemail');

            subjectSelect.addEventListener('change', function () {
                const selectedSubject = this.value;

                fetch("{{ route('fetch.emails') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ subject: selectedSubject })
                })
                .then(response => response.json())
                .then(data => {
                    recipientEmailSelect.innerHTML = '';
                    data.forEach(email => {
                        const option = document.createElement('option');
                        option.value = email;
                        option.text = email;
                        recipientEmailSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching emails:', error));
            });
        });
    </script>
</body>
</html>
