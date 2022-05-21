@extends('layouts.main')
@section('content')

    {!! $output !!}

    <script src="{{asset('assets/js/chart.min.js')}}"></script>
    <script>
        Chart.defaults.font.family = "Shabnam";
        Chart.defaults.font.size = 13;
        var ctx = document.getElementById('ChartComplaints').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line', // also try bar or other graph types

            // The data for our dataset
            data: {
                labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر"],
                // Information about the dataset
                datasets: [{
                    label: "نمودار شکایات مشتری",
                    backgroundColor: 'lightblue',
                    borderColor: 'royalblue',
                    data: [55.2, 77.4, 69.8, 57.8, 76, 110.8, 54],
                }]
            },

            // Configuration options
            options: {
                layout: {
                    padding: 10,
                },
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Precipitation in Toronto'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Precipitation in mm'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year'
                        }
                    }]
                }
            }
        });

        Chart.defaults.font.family = "Shabnam";
        Chart.defaults.font.size = 13;
        var ctxx = document.getElementById('ChartSale').getContext('2d');
        var chart = new Chart(ctxx, {
            // The type of chart we want to create
            type: 'bar', // also try bar or other graph types

            // The data for our dataset
            data: {
                labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر"],
                // Information about the dataset
                datasets: [{
                    label: "نمودار فروش",
                    backgroundColor: 'lightblue',
                    borderColor: 'royalblue',
                    data: [127.2, 91, 69.8, 57.8, 76, 110.8, 208],
                }]
            },

            // Configuration options
            options: {
                layout: {
                    padding: 10,
                },
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Precipitation in Toronto'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Precipitation in mm'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        $('#home_li').addClass("active");

    </script>
@endsection

