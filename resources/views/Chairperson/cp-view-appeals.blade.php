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
            border-radius: 12px;
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
            margin-left: 1rem;
            margin-right: 1rem;
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
            cursor: pointer;
        }

        .view-full i {
            margin-left: 0px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            margin-top: 10px;
        }

        .modal-body p {
            margin: 5px 0;
            padding: 1rem;
            background-color: #b4b4b4;
            border-radius: 4px;
        }

        .modal-body label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite('resources/css/app.css')
    <title>Appeals Inbox</title>
</head>

<body>
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
                                    id="searchInput">
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
                            <div id="appealsContainer">
                                @foreach($appeals as $appeal)
                                <div class="appeal-item" data-subject="{{ $appeal->subject }}">
                                    <div class="appeal-header">
                                        <div>
                                            <div class="appeal-subject">{{ $appeal->subject }}</div>
                                        </div>
                                        <a href="#" class="view-full" data-id="{{ $appeal->id }}"
                                            data-subject="{{ $appeal->subject }}" data-message="{{ $appeal->message }}"
                                            data-status="{{ $appeal->remarks }}" data-email="{{ $appeal->email }}"
                                            data-student-number="{{ $appeal->student_no }}">👁️ View Full Concern</a>
                                    </div>
                                    <div class="appeal-from">From: {{ $appeal->student_no }}</div>
                                    <div class="appeal-message">{{ $appeal->message }}</div>
                                    <div>
                                        <label for="status" class="block text-sm font-medium">Select Status:</label>
                                        <form method="POST" action="{{ route('update-appeal', $appeal->id) }}"
                                            class="status-form">
                                            @csrf
                                            @method('PUT')
                                            <select name="remarks" class="status-select" onchange="this.form.submit()">
                                                <option value="pending" @if($appeal->remarks == 'pending') selected
                                                    @endif>Pending</option>
                                                <option value="approved" @if($appeal->remarks == 'approved') selected
                                                    @endif>Approved</option>
                                                <option value="denied" @if($appeal->remarks == 'denied') selected
                                                    @endif>Denied</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="mt-4">
                    {{ $appeals->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Full Concern Details</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <label for="studentNumber"><strong>Student Number:</strong></label>
                <p id="studentNumber"></p>
                {{-- <label for="senderEmail"><strong>Sender Email:</strong></label>
                <p id="senderEmail"></p> --}}
                <label for="fullSubject"><strong>Subject:</strong></label>
                <p id="fullSubject"></p>
                <label for="fullMessage"><strong>Message:</strong></label>
                <p id="fullMessage"></p>
                <label for="modalStatus" class="block text-sm font-medium">Select Status:</label>
                <form method="POST" id="modalStatusForm">
                    @csrf
                    @method('PUT')
                    <select name="remarks" id="modalStatus" class="status-select">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="denied">Denied</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const appealsContainer = document.getElementById('appealsContainer');
            const appeals = Array.from(appealsContainer.getElementsByClassName('appeal-item'));
            const modal = document.getElementById('myModal');
            const span = document.getElementsByClassName('close')[0];

            searchInput.addEventListener('input', function () {
                const searchValue = this.value.toLowerCase();
                appeals.forEach(appeal => {
                    const subject = appeal.getAttribute('data-subject').toLowerCase();
                    if (subject.includes(searchValue)) {
                        appeal.style.display = '';
                    } else {
                        appeal.style.display = 'none';
                    }
                });
            });

            document.querySelectorAll('.view-full').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault();
                    const id = this.getAttribute('data-id');
                    const subject = this.getAttribute('data-subject');
                    const message = this.getAttribute('data-message');
                    const status = this.getAttribute('data-status');
                    const email = this.getAttribute('data-email');
                    const studentNumber = this.getAttribute('data-student-number');

                    document.getElementById('studentNumber').textContent = studentNumber;
                    // document.getElementById('senderEmail').textContent = email;
                    document.getElementById('fullSubject').textContent = subject;
                    document.getElementById('fullMessage').textContent = message;
                    document.getElementById('modalStatusForm').action = '/appeals/' + id;
                    document.getElementById('modalStatus').value = status;
                    modal.style.display = 'block';
                });
            });

            span.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            document.getElementById('modalStatus').addEventListener('change', function () {
                document.getElementById('modalStatusForm').submit();
            });
        });
    </script>
</body>

</html>