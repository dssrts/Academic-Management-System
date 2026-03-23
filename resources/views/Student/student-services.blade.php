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
                    <a href="https://plm.edu.ph/images/downloads/manuals/PLM_Student_Manual_v1.pdf" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3  bi bi-file-earmark-person" viewBox="0 0 16 16">
                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z"/>
                          </svg>
                        Student Manual
                    </a>
                    <a href="https://library.plm.edu.ph/" class="mr-2 flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3  bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                          </svg>
                        PLM Library
                    </a>
                    <a href="https://plm.edu.ph/" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
                          </svg>
                        PLM Website
                    </a>
                </div>

                <div class="bg-white rounded-lg shadow-lg scrollable-content w-full max-w-[750px]">
                    <div class="flex items-center justify-center bg-blue text-white p-2 rounded-t-lg">
                        <h2 class="text-[18px] font-bold font-inter italic">How to Book an Appointment with OGTS</h2>
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
                    <a href="#" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-house-gear" viewBox="0 0 16 16">
                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/>
                            <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                          </svg>
                        OGTS System
                    </a>
                    <a href="#" class="flex items-center bg-blue text-white text-[12px] font-bold py-1 px-3 rounded space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                          </svg>
                        OSDS System
                    </a>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
