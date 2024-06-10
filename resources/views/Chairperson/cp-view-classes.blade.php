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
    <style>
        .chart-container {

            background-color: white;
        }
    </style>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <h2 class="text-3xl font-bold mb-8">Class Schedule by Year Level</h2>
            <div class="grid grid-cols-2 gap-8">
                <!-- First Year Chart -->
                <div class="chart-container">
                    <h3 class="text-2xl font-bold">First Year</h3>
                    <div class="w-full p-4">
                        <canvas id="firstYearChart"></canvas>
                    </div>
                </div>

                <!-- Second Year Chart -->
                <div class="chart-container">
                    <h3 class="text-2xl font-bold">Second Year</h3>
                    <div class="w-full p-4">
                        <canvas id="secondYearChart"></canvas>
                    </div>
                </div>

                <!-- Third Year Chart -->
                <div class="chart-container">
                    <h3 class="text-2xl font-bold">Third Year</h3>
                    <div class="w-full p-4">
                        <canvas id="thirdYearChart"></canvas>
                    </div>
                </div>

                <!-- Fourth Year Chart -->
                <div class="chart-container">
                    <h3 class="text-2xl font-bold">Fourth Year</h3>
                    <div class="w-full p-4">
                        <canvas id="fourthYearChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const createChart = (ctx, data, label) => {
                return new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($days) !!},
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor: `rgba(0, 0, 255, 0.5)`,
                            borderColor: `rgba(0, 0, 255, 1)`,
                            borderWidth: 1
                        }]
                    },
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
                                text: label + ' - Number of Classes Each Day',
                                color: '#2D349A'
                            },
                        }
                    }
                });
            };

            const firstYearCtx = document.getElementById('firstYearChart').getContext('2d');
            createChart(firstYearCtx, {!! json_encode(array_values($yearData[1])) !!}, 'First Year');

            const secondYearCtx = document.getElementById('secondYearChart').getContext('2d');
            createChart(secondYearCtx, {!! json_encode(array_values($yearData[2])) !!}, 'Second Year');

            const thirdYearCtx = document.getElementById('thirdYearChart').getContext('2d');
            createChart(thirdYearCtx, {!! json_encode(array_values($yearData[3])) !!}, 'Third Year');

            const fourthYearCtx = document.getElementById('fourthYearChart').getContext('2d');
            createChart(fourthYearCtx, {!! json_encode(array_values($yearData[4])) !!}, 'Fourth Year');
        });
    </script>
</body>

</html>