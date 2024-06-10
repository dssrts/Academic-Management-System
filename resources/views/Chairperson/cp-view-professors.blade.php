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
    <title>Professors</title>
</head>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="professorModal">
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-auto" style="margin-top: 5rem">
            <!-- Header Section -->

            <!-- Content Section -->
            <div class="flex">
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-3xl font-bold">List of Professors in your Department</h2>

                    </div>
                    <form method="GET" action="{{ route('view-professors') }}">
                        <input type="text" name="search" placeholder="Search by name or email..."
                            class="px-3 py-2 mb-4 border rounded w-full" value="{{ request('search') }}">
                    </form>
                    <div class="bg-white rounded-lg p-6 mt-6 shadow-lg" style="background-color:white">
                        @if($professors->isEmpty())
                        <p>No professors found.</p>
                        @else
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-blue" style="color:white">
                                    <tr>
                                        <th class="px-4 py-2">Last Name</th>
                                        <th class="px-4 py-2">First Name</th>
                                        <th class="px-4 py-2">Middle Name</th>
                                        <th class="px-4 py-2">Email</th>
                                        <th class="px-4 py-2">Courses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($professors as $professor)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $professor->last_name }}</td>
                                        <td class="border px-4 py-2">{{ $professor->first_name }}</td>
                                        <td class="border px-4 py-2">{{ $professor->middle_name }}</td>
                                        <td class="border px-4 py-2">{{ $professor->email_address }}</td>
                                        <td class="border px-4 py-2">
                                            <ul>
                                                @foreach($professor->courses as $class)
                                                <li>{{ $class->course->subject_code }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $professors->links() }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="w-1/3 p-4" style="margin-top: 10rem;">
                    <canvas id="courseChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('professorModal', () => ({
                isModalOpen: false
            }));
        });

        function getUniqueBlueShades(count) {
            const shades = [];
            const step = Math.floor(255 / count);
            for (let i = 0; i < count; i++) {
                const blueValue = 255 - step * i;
                shades.push(`rgb(0, 0, ${blueValue})`);
            }
            return shades;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('courseChart').getContext('2d');
            const labels = {!! json_encode(array_keys($courseDistribution)) !!};
            const dataValues = {!! json_encode(array_values($courseDistribution)) !!};
            const backgroundColors = getUniqueBlueShades(labels.length);

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Number of Professors',
                    data: dataValues,
                    backgroundColor: backgroundColors,
                    borderColor: backgroundColors,
                    borderWidth: 1
                }]
            };

            const legendBackgroundPlugin = {
                id: 'legendBackground',
                beforeDraw: function (chart, args, options) {
                    const ctx = chart.ctx;
                    const legend = chart.legend;
                    const legendBoxWidth = legend.width + 10;
                    const legendBoxHeight = legend.height + 50;
                    const legendBoxX = (chart.width - legendBoxWidth) / 2;
                    const legendBoxY = legend.top;

                    ctx.save();
                    ctx.fillStyle = options.color || 'white';
                    
                    ctx.fillRect(legendBoxX, legendBoxY, legendBoxWidth, legendBoxHeight);
                    ctx.restore();
                }
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    return data.labels.map((label, i) => {
                                        const dataset = data.datasets[0];
                                        const backgroundColor = dataset.backgroundColor[i];
                                        const percentage = ((dataset.data[i] / dataValues.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + "%";
                                        return {
                                            text: `${label} - ${percentage}`,
                                            fillStyle: backgroundColor,
                                            strokeStyle: backgroundColor,
                                            hidden: false,
                                            index: i,
                                            boxWidth: 20,
                                            boxHeight: 20,
                                            fontSize: 14
                                        };
                                    });
                                },
                            }
                        },
                        title: {
                            display: true,
                            position:'bottom',
                            text: 'Course Distribution Among Professors',
                            color: '#2D349A'
                        },
                        datalabels: {
                            color: '#fff',
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value * 100 / sum).toFixed(2) + "%";
                                return percentage;
                            },
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels, legendBackgroundPlugin]
            };

            new Chart(ctx, config);
        });
    </script>
</body>

</html>