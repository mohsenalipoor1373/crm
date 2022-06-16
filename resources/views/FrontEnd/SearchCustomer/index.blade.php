@extends('layouts.main')
@section('content')
    <style>
        .swal2-container {
            z-index: 10000;
        }
    </style>

    <div id="TableData">
        {!! $output !!}
    </div>
    @include('FrontEnd.SearchCustomer.modals.modal')
    <script src="{{asset('/public/assets/js/dropzone.js')}}" type="text/javascript"></script>

    <script>


        Dropzone.autoDiscover = false;


        var myDropzone = new Dropzone("#events_file", {
            url: '{{route('events_customers_attach')}}',
            params: {
                "_token": "{{ csrf_token() }}"
            },
            paramName: "file",
            addRemoveLinks: true,
            maxFilesize: 10,
            maxFile: 50,
            parallelUpload: 10,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false,
            uploadMultiple: true,

        });

    </script>
    <script>
        var id = $('#id_events_customers').val();
    </script>
    <script>

        Dropzone.autoDiscover = false;
        var myDropzonee = new Dropzone("#events_file_detail", {
            url: '{{route('events_customers_detail_attach')}}',
            params: {
                "_token": "{{ csrf_token() }}"
            },
            paramName: "file",
            addRemoveLinks: true,
            maxFilesize: 10,
            maxFile: 50,
            parallelUpload: 10,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false,
            uploadMultiple: true,

            success: function (file, response) {

                $('.btn_add_events_customer_attach').prop('disabled', false);
                var loadingText = 'ثبت';
                $('.btn_add_events_customer_attach').html(loadingText);

                $('#add-events_customer_attach').modal('hide');
                $('#form_add_events_customer_attach').trigger("reset");
                $('#events_file_detail').empty();


                $('#events_detail_table').html(response);
            }
        });

    </script>


    <script>


        Dropzone.autoDiscover = false;
        var myDropzone_edit = new Dropzone("#edit_events_file", {
            url: '{{route('edit_events_customers_attach')}}',
            params: {
                "_token": "{{ csrf_token() }}"
            },
            paramName: "file",
            addRemoveLinks: true,
            maxFilesize: 10,
            maxFile: 50,
            parallelUpload: 10,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false,
            uploadMultiple: true,
            sending: function (file, xhr, formData) {
                formData.append("id", $("#edit_id_events_customer").val());
            },
            success: function (file, response) {
                $('.btn_edit_events_customer').prop('disabled', false);
                var loadingText = 'ثبت';
                $('.btn_edit_events_customer').html(loadingText);
            }

        });

    </script>



    <script>


        Dropzone.autoDiscover = false;
        var myDropzone_edit_detail = new Dropzone("#edit_events_file_detail", {
            url: '{{route('edit_events_customers_attach_detail')}}',
            params: {
                "_token": "{{ csrf_token() }}"
            },
            paramName: "file",
            addRemoveLinks: true,
            maxFilesize: 10,
            maxFile: 50,
            parallelUpload: 10,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false,
            uploadMultiple: true,
            sending: function (file, xhr, formData) {
                formData.append("id", $("#edit_id_events_customers").val());
            },
            success: function (file, response) {

                $('#form_edit_events_customer_attach').trigger("reset");
                $('#edit-events_customer_attach').modal('hide');
                $('.btn_edit_events_customer_attach').prop('disabled', false);
                var loadingText = 'ثبت';
                $('.btn_edit_events_customer_attach').html(loadingText);

                $('#events_detail_table').html(response);
                $('#edit_events_detail_table').html(response);
            }

        });

    </script>



    <script src="{{asset('/public/assets/js/chart.min.js')}}"></script>
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
                    label: "نمودار ریالی",
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
                    label: "نمودار وزن و تعداد",
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

@endsection
@section('script')
    @include('FrontEnd.SearchCustomer.partials.js')
@endsection
