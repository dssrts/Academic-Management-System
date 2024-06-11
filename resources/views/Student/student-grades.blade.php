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
        <div class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
                <img src="images/plm-logo.png" alt="PLM AMS" class="h-9 ml-3 mr-2">
                <h1 class="text-[24px] font-bold ml-2 text-blue">PLM AMS</h1>
            </div>
        </div>

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
                            <label for="aysem" class="mr-2 text-blue font-bold">AYSEM (eg.20231):</label>
                            <input type="text" id="aysem" name="aysem" class="border rounded p-2 mr-2" placeholder="202xx">
                            <button class="bg-blue text-white px-4 py-2 rounded font-bold">Submit</button>
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
                    labels: ['1st Yr (1st Sem)', '1st Yr (2nd Sem)', '2nd Yr (1st Sem)', '2nd Yr (2nd Sem)', '3rd Yr (1st Sem)'],
                    datasets: [{
                        label: 'GWA',
                        data: [1.3, 2.0, 1.5, 2.5, 1.8], // Dummy data
                        borderColor: '#D5A106', // Line color
                        borderWidth: 2,
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
