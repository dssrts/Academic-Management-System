<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .scrollable-content {
            overflow-y: auto;
            max-height: calc(100vh - 80px); /* Adjust based on header height */
        }
    </style>
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Student Services'])

            <!-- Main content -->
            <div class="flex-1 flex flex-col items-center justify-center p-2 overflow-hidden">
                <!-- Buttons above main content on the right -->
                <div class="flex justify-end w-full mb-2 space-x-2">
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">Student Manual</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">PLM Library</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">PLM Website</button>
                </div>

                <div class="bg-white rounded-lg shadow-lg scrollable-content w-full max-w-[750px]">
                    <div class="flex items-center justify-center bg-blue text-white p-2 rounded-t-lg">
                        <h2 class="text-[16px] font-bold">How to Book an Appointment with OGTS</h2>
                    </div>
                    <div class="p-2 space-y-1">
                        <div class="text-[10px]">
                            <h3 class="font-bold text-blue">STEP 1</h3>
                            <p class="font-bold text-blue">Inform the Student/Employee to send an email using the PLM Outlook Account with the subject title of email:</p>
                            <p><strong>Student/Employee Number_Surname</strong> to avail of OGTS Counseling/Consultation Services by sending the following details to <strong>ogts_services@plm.edu.ph</strong></p>
                            <ol class="list-decimal ml-4">
                                <li>Complete Name</li>
                                <li>Degree Program/Position</li>
                                <li>College/Unit</li>
                                <li>Student/Employee Number</li>
                                <li>Contact Number</li>
                                <li>Name of OGTS Counselor (if the student/employee availed the Counseling Service in the past)</li>
                                <li>Brief description of concern</li>
                            </ol>
                        </div>
                        <div class="text-[10px]">
                            <h3 class="font-bold text-blue">STEP 2</h3>
                            <p class="font-bold text-blue">The individual shall wait for email response and follow instructions on how to proceed.</p>
                            <ol class="list-decimal ml-4">
                                <li>DOWNLOAD and FILL-OUT the Counselee Personal Information (CPI) form, disregard if CPI has been previously submitted.</li>
                                <li>Rename the file to: Student/Employee number_Surname [e.g. 2020-12345 Abad]</li>
                                <li>Reply to the email by attaching the CPI and indicating three (3) preferred schedules to properly process the request.</li>
                                <li>Be notified of the appointment schedule via email then proceed to the next step.</li>
                            </ol>
                        </div>
                        <div class="text-[10px]">
                            <h3 class="font-bold text-blue">STEP 3</h3>
                            <p class="font-bold text-blue">Proceed on the day of the appointment by following the instructions provided in the email.</p>
                            <ol class="list-decimal ml-4">
                                <li>Make sure to use the platform as mentioned in the instructions.</li>
                                <li>Log in 10 minutes before the schedule.</li>
                                <li>Proceed to the availment of service.</li>
                            </ol>
                        </div>
                        <div class="flex justify-center">
                            <a href="/student-ogts-appoinment" class="bg-blue text-[15px] text-white font-bold py-1 px-3 rounded mt-2 mb-2">Book an Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 mt-2">
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">OGTS System</button>
                    <button class="bg-blue text-white text-[12px] font-bold py-1 px-3 rounded">OSDS System</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
