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

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1E3A8A;
        }

        .card-subtitle {
            font-size: 0.9rem;
            color: #1E3A8A;
        }

        .card-body {
            background-color: #2C56A6;
            color: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 10px;
            text-align: left;
        }

        .card-body h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card-body p {
            margin: 0;
        }

        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
    <title>Students</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <div class="flex">
                <div class="grid grid-cols-2 gap-4 w-2/3">
                    <div class="card">
                        <h2 class="card-title">Enrolled Students</h2>
                        <p class="card-subtitle">1ST SEM - AY 2023-2024</p>
                        <div class="card-body">
                            <h1>{{ $enrolledStudents }}</h1>
                            <p>Enrolled Students</p>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="card-title">Enlisted Students</h2>
                        <p class="card-subtitle">1ST SEM - AY 2023-2024</p>
                        <div class="card-body">
                            <h1>{{ $enlistedStudents }}</h1>
                            <p>Enlisted Students</p>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="card-title">Regular Students</h2>
                        <p class="card-subtitle">1ST SEM - AY 2023-2024</p>
                        <div class="card-body">
                            <h1>{{ $regularStudents }}</h1>
                            <p>Regular Students</p>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="card-title">Irregular Students</h2>
                        <p class="card-subtitle">1ST SEM - AY 2023-2024</p>
                        <div class="card-body">
                            <h1>{{ $irregularStudents }}</h1>
                            <p>Irregular Students</p>
                        </div>
                    </div>
                </div>
                <div class="chart-container w-1/3 ml-4">
                    <canvas id="yearLevelChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('yearLevelChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['1st Year Students', '2nd Year Students', '3rd Year Students', '4th Year Students'],
                    datasets: [{
                        data: {!! json_encode(array_values($studentsPerYearLevel)) !!},
                        backgroundColor: [
                            '#1E3A8A', // Dark Blue for 1st Year
                            '#3B82F6', // Light Blue for 2nd Year
                            '#60A5FA', // Lighter Blue for 3rd Year
                            '#93C5FD'  // Lightest Blue for 4th Year
                        ],
                        borderColor: [
                            '#1E3A8A',
                            '#3B82F6',
                            '#60A5FA',
                            '#93C5FD'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 20,
                                padding: 15,
                                font: {
                                    size: 14,
                                    weight: 'bold',
                                    family: 'Inter'
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Number of Students Per Year Level',
                            color: '#2D349A',
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: 'Inter'
                            },
                            padding: {
                                top: 20,
                                bottom: 10
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>