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

        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #38a169;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .modal {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 5rem;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .modal-header button {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-footer button {
            background-color: #1E3A8A;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-footer button:hover {
            background-color: #274494;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Assign Classes</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="alert" id="alertBox">{{ session('success') }}</div>
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
                    setTimeout(function() {
                        alertBox.style.display = 'none';
                    }, 5000);
                });
            </script>
            @endif

            <div class="modal">
                <div class="modal-header">
                    <h2>Assign Classes to Instructors</h2>

                </div>
                <form method="POST" action="{{ route('assign-classes.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label for="class_subject" class="block text-sm font-medium text-gray-700">Class
                                Subject</label>
                            <select id="class_subject" name="class_id" class="mt-1 block w-full"
                                style="background-color:#d9dadb;">
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="instructor" class="block text-sm font-medium text-gray-700">Teaching
                                Professor</label>
                            <select id="instructor" name="instructor_id" class="mt-1 block w-full"
                                style="background-color:#d9dadb;" required>
                                @foreach($instructors as $instructor)
                                <option value="{{ $instructor->id }}">{{ $instructor->last_name }}, {{
                                    $instructor->first_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit">Assign Class to Instructor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>