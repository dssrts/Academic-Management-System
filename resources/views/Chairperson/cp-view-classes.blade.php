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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    @vite('resources/css/app.css')
    <title>Class Schedule by Year Level</title>
    <style>
        .chart-container {
            background-color: white;
            padding: 10px;
        }
    </style>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <div class="flex">
                <div class="w-2/3 grid grid-cols-2 gap-8">
                    <!-- First Year Chart -->
                    <div class="chart-container">
                        <div class="w-full p-4">
                            <canvas id="firstYearChart"></canvas>
                        </div>
                    </div>

                    <!-- Second Year Chart -->
                    <div class="chart-container">
                        <div class="w-full p-4">
                            <canvas id="secondYearChart"></canvas>
                        </div>
                    </div>

                    <!-- Third Year Chart -->
                    <div class="chart-container">
                        <div class="w-full p-4">
                            <canvas id="thirdYearChart"></canvas>
                        </div>
                    </div>

                    <!-- Fourth Year Chart -->
                    <div class="chart-container">
                        <div class="w-full p-4">
                            <canvas id="fourthYearChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 p-4">
                    <canvas id="totalUnitsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const createChart = (ctx, data, label, color) => {
                return new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($days) !!},
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor: color,
                            borderColor: color,
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
                                display: false,
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                }
                            },
                            title: {
                                display: true,
                                text: label + ' - Number of Classes Each Day',
                                color: '#2D349A',
                                position: 'bottom'
                            },
                        }
                    }
                });
            };

            const firstYearCtx = document.getElementById('firstYearChart').getContext('2d');
            createChart(firstYearCtx, {!! json_encode(array_values($yearData[1])) !!}, 'First Year', 'rgba(173, 216, 230, 0.5)');

            const secondYearCtx = document.getElementById('secondYearChart').getContext('2d');
            createChart(secondYearCtx, {!! json_encode(array_values($yearData[2])) !!}, 'Second Year', 'rgba(135, 206, 235, 0.5)');

            const thirdYearCtx = document.getElementById('thirdYearChart').getContext('2d');
            createChart(thirdYearCtx, {!! json_encode(array_values($yearData[3])) !!}, 'Third Year', 'rgba(0, 191, 255, 0.5)');

            const fourthYearCtx = document.getElementById('fourthYearChart').getContext('2d');
            createChart(fourthYearCtx, {!! json_encode(array_values($yearData[4])) !!}, 'Fourth Year', 'rgba(30, 144, 255, 0.5)');

            const totalUnitsCtx = document.getElementById('totalUnitsChart').getContext('2d');

            const legendBackgroundPlugin = {
                id: 'legendBackground',
                beforeDraw: function (chart, args, options) {
                    const ctx = chart.ctx;
                    const legend = chart.legend;
                    const legendBoxWidth = legend.width + 10;
                    const legendBoxHeight = legend.height + 50;
                    const legendBoxX = (chart.width - legendBoxWidth) / 2;
                    const legendBoxY = legend.top - 10; // Adjust the position as needed

                    ctx.save();
                    ctx.fillStyle = options.color || 'white';
                    ctx.fillRect(legendBoxX, legendBoxY, legendBoxWidth, legendBoxHeight);
                    ctx.restore();
                }
            };

            new Chart(totalUnitsCtx, {
                type: 'pie',
                data: {
                    labels: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
                    datasets: [{
                        data: {!! json_encode(array_values($totalUnitsPerYear)) !!},
                        backgroundColor: [
                            'rgba(173, 216, 230)', // light blue
                            'rgba(135, 206, 235)', // sky blue
                            'rgba(0, 191, 255)',   // deep sky blue
                            'rgba(30, 144, 255)'   // dodger blue
                        ],
                        borderColor: [
                            'rgba(173, 216, 230, 1)',
                            'rgba(135, 206, 235, 1)',
                            'rgba(0, 191, 255, 1)',
                            'rgba(30, 144, 255, 1)'
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
                                padding: 20,
                                generateLabels: function (chart) {
                                    const data = chart.data;
                                    return data.labels.map((label, i) => {
                                        const dataset = data.datasets[0];
                                        const backgroundColor = dataset.backgroundColor[i];
                                        return {
                                            text: `${label}`,
                                            fillStyle: backgroundColor,
                                            strokeStyle: backgroundColor,
                                            hidden: false,
                                            index: i
                                        };
                                    });
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Total Units by Year Level',
                            color: '#2D349A'
                        },
                    }
                },
                plugins: [legendBackgroundPlugin]
            });
        });
    </script>
</body>

</html>