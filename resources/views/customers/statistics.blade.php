@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <div class="container">
        <div>
            <select name="chartType" id="chartType" onchange="updateChartType()">
                <option value="">Select Bar</option>
                <option value="line">Line</option>
                <option value="bar">Bar</option>
            </select>
            <select name="statisticType" id="statisticType" onchange="updateStatisticType()">
                <option value="">Select Statistic Type</option>
                <option value="registerPerMonth">Monthly Registrations</option>
                <option value="loginPerMonth">Logins Per Month</option>
            </select>
        </div>
        <div>
            <canvas id="myChart" height="100"></canvas>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        let [data, labels, type, label] = {{Js::from($data)}};

        let datasets = [
            {
                label: label,
                data: data,
                borderColor: '#0a0ef2',
                backgroundColor: '#0a0ef2',
                borderWidth: 1,
            }
        ];

        let options = {
            responsive: true,
            maintainAspectRatio: true,
            title: {
                display: true,
                position: "top",
                text: "Order Report",
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {precision: 0}
                }
            }
        };

        let chartConfig = {
            type: type,
            data: {
                labels: labels,
                datasets: datasets,
            },
            options: options,
        }

        let myChart = new Chart(ctx, chartConfig);

        const updateChartType = () => {
            if (document.getElementById("chartType").value === "") return;

            chartConfig.type = document.getElementById("chartType").value;
            myChart.destroy();
            myChart = new Chart(ctx, chartConfig);
        };

        const updateStatisticType = () => {
            if (document.getElementById("statisticType").value === "") return;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "http://localhost:8000/admin/statistics",
                type: 'POST',
                data: $("#statisticType").serialize(),
                success: function (data) {
                    addData(data.data[0], data.data[1], data.data[2], data.data[3]);
                },
                error: function (data) {
                    // Dosomething on error
                }
            });
        }

        const addData = (data, labels, type, label) => {
            chartConfig = {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        borderColor: '#0a0ef2',
                        backgroundColor: '#0a0ef2',
                        borderWidth: 1,
                    }],
                },
            }
            myChart.destroy();
            myChart = new Chart(ctx, chartConfig);
        }
    </script>
@endsection
