@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <div class="container">
        <div>
            <select name="chartType" id="chartType" onchange="updateChartType()">
                <option value="">{{__('names.selectChartType')}}</option>
                <option value="line">{{__('names.line')}}</option>
                <option value="bar">{{__('names.bar')}}</option>
                <option value="pie">{{__('names.pie')}}</option>
            </select>
            <select name="statisticType" id="statisticType" onchange="updateStatisticType()">
                <option value="">{{__('names.selectStatisticType')}}</option>
                <option value="registerPerMonth">{{__('names.monthlyRegistrations')}}</option>
                <option value="loginPerMonth">{{__('names.monthlyLogins')}}</option>
                <option value="userAdminCount">{{__('names.userAdminCount')}}</option>
                <option value="paidOrders">{{__('names.paidOrders')}}</option>
                <option value="unpaidOrders">{{__('names.unpaidOrders')}}</option>
                <option value="cancelledOrders">{{__('names.cancelledOrders')}}</option>

            </select>
        </div>
        <div>
            <canvas id="myChart" height="100"></canvas>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        let [data, labels, type, label] = {{Js::from($data)}};

        const borderColorArr = [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',]

        const backgroundColorArr = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',]

        let datasets = [
            {
                label: label,
                data: data,
                borderColor: borderColorArr,
                backgroundColor: backgroundColorArr,
                borderWidth: 1,
            }
        ];

        let options = {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 3,
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
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: Math.round,
                    font: {
                        weight: 'bold'
                    }
                }
            },

        };

        let chartConfig = {
            type: type,
            data: {
                labels: labels,
                datasets: datasets,
            },
            options: options,
            plugins: [ChartDataLabels],
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
                        borderColor: borderColorArr,
                        backgroundColor: backgroundColorArr,
                        borderWidth: 1,
                    }],
                },
                options: options,
                plugins: [ChartDataLabels],
            }
            myChart.destroy();
            myChart = new Chart(ctx, chartConfig);
        }
    </script>
@endsection
