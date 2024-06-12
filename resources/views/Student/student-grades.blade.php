<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
    <style>
        .chart-container {
            position: relative;
            height: 300px; /* Adjust the height as needed */
            width: 100%;
        }
    </style>
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        @include('components.student-header')

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Grades'])

            <!-- Main content -->
            <div class="flex-1 p-10 overflow-hidden">
                <!-- GWA Graph Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-blue">Graph of Overall GWA</h2>
                            <p>Per Semester</p>
                        </div>
                        <div class="flex items-center">
                            <form method="GET" action="{{ route('student.grades') }}">
                                <label for="aysem" class="mr-2 text-blue font-bold">AYSEM   ( <span class="text-gold-amber"> eg.2023 </span> )  :</label>
                                <input type="text" id="aysem" name="aysem" class="border rounded p-2 mr-2" placeholder="202xx" value="{{ $selectedAysem }}">
                                <button type="submit" class="bg-blue text-white px-4 py-2 rounded font-bold">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="gwaChart" class="max-w-full h-auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('gwaChart').getContext('2d');
            var gwaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'GWA',
                        data: @json($gradesData),
                        borderColor: '#D5A106', // Line color
                        borderWidth: 2,
                        fill: false,
                        lineTension: 0.1
                    }, {
                        label: 'Overall Average GWA',
                        data: Array(@json($labels).length).fill(@json($overallAverageGwa)),
                        borderColor: '#2D349A', // Red color for the average line
                        borderWidth: 2,
                        borderDash: [10, 5], // Dashed line
                        fill: false,
                        lineTension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            min: 1,
                            max: 5,
                            reverse: true,
                            ticks: {
                                stepSize: 0.5
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
