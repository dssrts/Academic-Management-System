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

        body {
            background-image: url('/images/PLM.png');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 10rem;
            background-color: #1a237e;
            /* dark blue background */
            border-radius: 12px;
            /* padding: 20px; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
            margin-top: 10rem;
        }

        .title-box {
            font-size: 1.5em;
            margin-bottom: 0;
            text-align: center;
            background-color: white;
            color: #1a237e;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .title-box svg {
            margin-right: 10px;
        }

        .search-bar-container {
            position: relative;
            width: 85%;
            margin-top: 1rem;
            margin-left: 5rem;
            margin-right: 5rem;
            margin-bottom: 2rem;
        }

        .search-bar {
            width: 100%;
            padding: 10px 10px 10px 40px;
            /* Adjusted padding to make space for icon on the left */
            border: none;
            border-radius: 5px;
            color: black;
        }

        .search-bar-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        .appeal-item {
            background-color: white;
            color: black;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .appeal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .appeal-subject {
            font-weight: bold;
            font-size: 1.2em;
        }

        .appeal-from {
            color: gray;
            font-size: 0.9em;
        }

        .appeal-message {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .status-select {
            width: 150px;
            padding: 5px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .view-full {
            display: flex;
            align-items: center;
            color: black;
            text-decoration: none;
            font-size: 0.9em;
        }

        .view-full i {
            margin-left: 0px;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite('resources/css/app.css')
    <title>Appeals Inbox</title>
</head>

<body x-data="{ appeals: {{ json_encode($appeals) }}, search: '' }">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex justify-center items-center">
            <div class="container">
                <table style="width: 100%;">
                    <tr>
                        <td class="title-box font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" width="24" height="24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Appeals Inbox
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="search-bar-container">
                                <input type="text" class="search-bar" placeholder="Search by Subject..."
                                    x-model="search">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="search-bar-icon" width="24" height="24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <template
                                x-for="appeal in appeals.filter(a => a.subject.toLowerCase().includes(search.toLowerCase()))">
                                <div class="appeal-item">
                                    <div class="appeal-header">
                                        <div>
                                            <div class="appeal-subject" x-text="appeal.subject"></div>
                                            <div class="appeal-from" x-text="'From: ' + appeal.student.plm_email"></div>
                                        </div>
                                        <a href="#" class="view-full">👁️ View Full Concern</a>
                                    </div>
                                    <div class="appeal-message" x-text="appeal.message"></div>
                                    <div>
                                        <label for="status" class="block text-sm font-medium">Select Status:</label>
                                        <select name="status" class="status-select">
                                            <option value="pending" :selected="appeal.remarks == 'pending'">Pending
                                            </option>
                                            <option value="approved" :selected="appeal.remarks == 'approved'">Approved
                                            </option>
                                            <option value="denied" :selected="appeal.remarks == 'denied'">Denied
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </template>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>