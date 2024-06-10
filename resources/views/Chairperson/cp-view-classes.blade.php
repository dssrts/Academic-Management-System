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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
    <title>Class Schedule by Year Level</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <h2 class="text-3xl font-bold">Class Schedule by Year Level</h2>
            <div class="w-full p-4">
                <canvas id="classScheduleChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('classScheduleChart').getContext('2d');
            const data = {
                labels: {!! json_encode($days) !!},
                datasets: [
                    @foreach($data as $yearLevel => $yearLevelData)
                    {
                        label: 'Year Level {{ $yearLevel }}',
                        data: {!! json_encode(array_values($yearLevelData)) !!},
                        backgroundColor: `rgba(0, 0, {{ 255 - $yearLevel * 50 }}, 0.5)`,
                        borderColor: `rgba(0, 0, {{ 255 - $yearLevel * 50 }}, 1)`,
                        borderWidth: 1
                    },
                    @endforeach
                ]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                            }
                        },
                        title: {
                            display: true,
                            text: 'Number of Classes Each Day per Year Level',
                            color: '#2D349A'
                        },
                    }
                }
            };

            new Chart(ctx, config);
        });
    </script>
</body>

</html>