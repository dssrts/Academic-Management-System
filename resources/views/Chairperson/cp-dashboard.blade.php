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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    @vite('resources/css/app.css')
    <title>CRS</title>
</head>

<style>
    #info-container {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        margin-top: 8rem;
        margin-left: 2rem;
        gap: 2rem;
    }

    #info {
        color: #2D349A;
        display: flex;
        flex-direction: column;
        height: max-content;
        background-color: white;
        padding: 2rem;
        border: 1px solid #ccc;
        border-radius: 12.3px;
    }

    #info-text {
        font-size: 1.5rem;
        color: white;
        padding: 10px;
        padding-right: 5rem;
        border: 1px solid #ccc;
        background-color: #2C56A6;
        border-radius: 10.26px;
    }

    #content-container {
        display: flex;
        flex-direction: row;
        gap: 2rem;
        margin-top: 2rem;
    }

    .table-container {
        flex: 1;
    }

    .chart-container {
        width: 250px;

    }

    .legend-box {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 12.3px;
        padding: 1rem;
        margin-top: 1rem;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .legend-box p {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        display: inline-block;
        margin-right: 10px;
        border-radius: 4px;
    }

    .legend-title {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
</style>

<body style="background-image: url('/images/PLM.png'); background-repeat: no-repeat; background-size: cover"
    x-data="{ btns: {{ json_encode($btns) }} }">
    <!-- Whole Container -->
    <div class="w-screen h-screen flex flex-row">
        <!-- Sidebar -->
        <x-chairperson-sidebar />
        <!-- Main Content -->

        <div class="flex-1 flex flex-col p-10">
            <!-- Info Boxes -->
            <div id="info-container">
                <div id="info">
                    <span class="font-bold mb-3">Department:</span>
                    <div id="info-text">
                        <span class="font-bold">{{ $program->program_code }}</span>
                    </div>
                </div>
                <div id="info">
                    <span class="font-bold mb-3">SFE statistics:</span>
                    <div id="info-text">
                        <p class="font-bold">70%</p>
                        <p style="font-size:1rem">1,560 students answered</p>
                    </div>
                </div>
            </div>

            <!-- Content Container -->
            <div id="content-container">
                <!-- Students Table -->
                <div class="table-container rounded-lg shadow-md p-6 overflow-x-auto mt-8">
                    <table class="min-w-full bg-white-10">
                        <thead class="bg-blue" style="color:white">
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300">Student No</th>
                                <th class="py-2 px-4 border-b border-gray-300">First Name</th>
                                <th class="py-2 px-4 border-b border-gray-300">Last Name</th>
                                {{-- <th class="py-2 px-4 border-b border-gray-300">Email</th> --}}
                                <th class="py-2 px-4 border-b border-gray-300">Year Level</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($students as $student)
                            <tr class="bg-white">
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->student_no }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->first_name }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->last_name }}</td>
                                {{-- <td class="py-2 px-4 border-b border-gray-300">{{ $student->email }}</td> --}}
                                <td class="py-2 px-4 border-b border-gray-300">{{ $student->studentTerm->year_level }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                </div>

                <!-- Chart -->
                <div class="chart-container mt-8">
                    <canvas id="gradesChart" width="400" height="400"></canvas>
                    <div class="legend-box">
                        <div class="legend-title">Legends:</div>
                        <p><span class="legend-color" style="background-color: rgba(75, 192, 192, 0.2);"></span>1st Year
                            Students</p>
                        <p><span class="legend-color" style="background-color: rgba(54, 162, 235, 0.2);"></span>2nd Year
                            Students</p>
                        <p><span class="legend-color" style="background-color: rgba(255, 206, 86, 0.2);"></span>3rd Year
                            Students</p>
                        <p><span class="legend-color" style="background-color: rgba(79, 116, 187);"></span>4th Year
                            Students</p>
                        <p class="font-bold mt-2" style="color: #2D349A">Average GWA of Students Per Year Level</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('gradesChart').getContext('2d');
            const gradesChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($yearLevels),
                    datasets: [{
                        label: 'Average Grades by Year Level',
                        data: @json($averageGrades),
                        backgroundColor: [
                            'rgba(79, 116, 187)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 255, 255)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        title: {
                            display: false,
                            text: 'Average Grades by Year Level'
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'start',
                            formatter: (value) => {
                                return value;
                            },
                            color: 'white',
                            font: {
                                weight: 'bold',
                                size: '16'
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