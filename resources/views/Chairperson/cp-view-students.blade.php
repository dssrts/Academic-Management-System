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
            margin-right: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 30rem;
            height: 250px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
            padding: 10px;
            margin-top: 10px;
            text-align: left;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
        }

        .card-body h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card-body p {
            margin: 0;
        }

        .chart-container {
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: transparent;
            text-align: center;
            width: 300px;
            height: 300px;
        }

        .legend-box {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
            text-align: left;
            display: inline-block;
        }

        .legend-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #2D349A;
        }

        .legend-color {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 4px;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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
                <div class="grid grid-cols-2 gap-4">
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
                <div class="chart-container ml-4">
                    <canvas id="yearLevelChart"></canvas>
                    <div class="legend-box">
                        <div class="legend-title">Legends:</div>
                        <p><span class="legend-color" style="background-color: #1E3A8A;"></span>1st Year Students</p>
                        <p><span class="legend-color" style="background-color: #3B82F6;"></span>2nd Year Students</p>
                        <p><span class="legend-color" style="background-color: #60A5FA;"></span>3rd Year Students</p>
                        <p><span class="legend-color" style="background-color: #93C5FD;"></span>4th Year Students</p>
                        <p class="font-bold mt-2" style="color: #2D349A">Number of Students Per Year Level</p>
                    </div>
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
                            display: false,
                        },
                        title: {
                            display: false,
                        },
                        datalabels: {
                            color: 'white',
                            formatter: (value, context) => {
                                return value;
                            },
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
</body>

</html>