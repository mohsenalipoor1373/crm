<script src="{{asset('assets/js/chart.min.js')}}"></script>

<script type="text/javascript">

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('customer_page')}}+ " / " +{{$id}}",
                success: function (res) {
                    $('#TableData').html(res);
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

                    $('.data-table').DataTable({
                        'paging': false,
                        'searching': false,
                        'ordering': true,
                        'info': false,
                        "language": {
                            "search": "جستجو :",
                            "lengthMenu": "نمایش : _MENU_",
                            "zeroRecords": " موردی یافت نشد !",
                            "info": "نمایش _PAGE_ از _PAGES_",
                            "infoEmpty": " موردی یافت نشد !",
                            "infoFiltered": "(جستجو از _MAX_ مورد)",
                            "processing": "در حال پردازش اطلاعات",
                            'paginate': {
                                'previous': 'قبلی',
                                'next': 'بعدی'
                            }
                        }

                    });

                }
            })
        }

        $('.data-table').DataTable({
            'paging': false,
            'searching': false,
            'ordering': true,
            'info': false,
            "language": {
                "search": "جستجو :",
                "lengthMenu": "نمایش : _MENU_",
                "zeroRecords": " موردی یافت نشد !",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": " موردی یافت نشد !",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات",
                'paginate': {
                    'previous': 'قبلی',
                    'next': 'بعدی'
                }
            }

        });

        $('body').on('click', '.add_events', function () {
            $('#id_events_customers').val('');
            $('#form_add_events_customer').trigger("reset");
            $('#events_file').empty();
            $('#events_file_detail').empty();
            $('#add-events_customer').modal('show');
        });

        $('body').on('click', '.add_events_customer_attach', function () {
            $('#add-events_customer_attach').modal('show');
        });

        $('body').on('click', '.btn_add_events_customer', function (e) {
            $('.btn_add_events_customer').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_events_customer').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_add_events_customer')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_events_customers')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        $('#id_events_customers').val(data.id.id);
                        myDropzone.processQueue();
                        load_table();
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_customer').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_customer').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.events_type_id) {
                            msg = data.errors.events_type_id;
                        }
                        if (data.errors.events_subject_id) {
                            msg = data.errors.events_subject_id;
                        }
                        if (data.errors.events_result_id) {
                            msg = data.errors.events_result_id;
                        }
                        if (data.errors.events_result_reason_id) {
                            msg = data.errors.events_result_reason_id;
                        }
                        if (data.errors.negotiator_id) {
                            msg = data.errors.negotiator_id;
                        }
                        if (data.errors.date) {
                            msg = data.errors.date;
                        }
                        if (data.errors.negotiator_name) {
                            msg = data.errors.negotiator_name;
                        }
                        if (data.errors.negotiator_phone) {
                            msg = data.errors.negotiator_phone;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_customer').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_customer').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_events_customer').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_events_customer').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_events_customer', function (e) {
            $('.btn_edit_events_customer').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_events_customer').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_edit_events_customer')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_edit_events_customers')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        myDropzone_edit.processQueue();
                        load_table();
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });

                    } else {
                        var msg;
                        if (data.errors.edit_events_type_id) {
                            msg = data.errors.edit_events_type_id;
                        }
                        if (data.errors.edit_events_subject_id) {
                            msg = data.errors.edit_events_subject_id;
                        }
                        if (data.errors.edit_events_result_id) {
                            msg = data.errors.edit_events_result_id;
                        }
                        if (data.errors.edit_events_result_reason_id) {
                            msg = data.errors.edit_events_result_reason_id;
                        }
                        if (data.errors.edit_negotiator_id) {
                            msg = data.errors.edit_negotiator_id;
                        }
                        if (data.errors.edit_date) {
                            msg = data.errors.edit_date;
                        }
                        if (data.errors.edit_negotiator_name) {
                            msg = data.errors.edit_negotiator_name;
                        }
                        if (data.errors.edit_negotiator_phone) {
                            msg = data.errors.edit_negotiator_phone;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_customer').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_customer').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_events_customer').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_customer').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_events_customers', function () {
            $('#edit_events_file').empty();
            $('.edit_events_type_id').empty();
            $('.edit_events_subject_id').empty();
            $('.edit_events_result_id').empty();
            $('.edit_events_result_reason_id').empty();
            $('.edit_negotiator_id').empty();
            $('#load_modal_events_customer').show();
            $('#edit-events_customer').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_events_customers')}}",
                data: {id},
                type: 'GET',
                success: function (data) {

                    myDropzone_edit.processQueue();
                    for (i = 0; i < data.events_customers_attach.length; i++) {
                        var asset_file = "/" + data.events_customers_attach[i].file;
                        var mockFile = {
                            name: data.events_customers_attach[i].file,
                            size: '',
                            width: '100px',
                            type: '',
                            viewLink: "events_customers_attach/" + data.events_customers_attach[i].file,
                            nominationId: '',
                            id: '',
                            media: "",

                        };
                        myDropzone_edit.emit("addedfile", mockFile);
                        myDropzone_edit.emit("thumbnail", mockFile, `{{ asset('events_customers_attach/') }}${asset_file}`);
                        myDropzone_edit.emit("complete", mockFile);
                    }


                    for (i = 0; i < data.events_types.length; i++) {
                        $('.edit_events_type_id').append(
                            "<option value='" + data.events_types[i].id + "'>" + data.events_types[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.events_subjects.length; i++) {
                        $('.edit_events_subject_id').append(
                            "<option value='" + data.events_subjects[i].id + "'>" + data.events_subjects[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.events_results.length; i++) {
                        $('.edit_events_result_id').append(
                            "<option value='" + data.events_results[i].id + "'>" + data.events_results[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.events_result_reasons.length; i++) {
                        $('.edit_events_result_reason_id').append(
                            "<option value='" + data.events_result_reasons[i].id + "'>" + data.events_result_reasons[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.users.length; i++) {
                        $('.edit_negotiator_id').append(
                            "<option value='" + data.users[i].id + "'>" + data.users[i].name + ' ' + data.users[i].fname + "</option>"
                        );
                    }


                    $('.edit_events_type_id').val(data.data.events_type_id);
                    $('.edit_events_subject_id').val(data.data.events_subject_id);
                    $('.edit_events_result_id').val(data.data.events_result_id);
                    $('.edit_events_result_reason_id').val(data.data.events_result_reason_id);
                    $('.edit_negotiator_id').val(data.data.negotiator_id);
                    $('#edit_date').val(data.data.date);
                    $('#edit_negotiator_name').val(data.data.negotiator_name);
                    $('#edit_negotiator_phone').val(data.data.negotiator_phone);
                    $('#edit_negotiator_text').val(data.data.negotiator_text);
                    $('#edit_order_number').val(data.data.order_number);
                    $('#edit_id_events_customer').val(data.data.id);
                    $('#edit_events_detail_table').html(data.output);

                    $('#load_modal_events_customer').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers_brands').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_brands').html(loadingText);
                    $('#edit-customers_brands').modal('hide');
                    $('#load_modal_brands').fadeOut();

                }
            });
        });

        $('body').on('click', '.see_detail', function () {
            $('#load_modal_see_customers_events_detail').show();
            $('#see_customers_events_detail').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('see_customers_events_detail')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#table_see_customers_events_detail').html(data);
                    $('#load_modal_see_customers_events_detail').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                }
            });
        });

        $('body').on('click', '.btn_add_events_customer_attach', function (e) {
            $('.btn_add_events_customer_attach').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_events_customer_attach').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_add_events_customer_attach')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_events_customers_detail')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        myDropzonee.processQueue();
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });


                    } else {
                        var msg;
                        if (data.errors.events_customers_id) {
                            msg = data.errors.events_customers_id;
                        }
                        if (data.errors.text) {
                            msg = data.errors.text;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_customer_attach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_customer_attach').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_events_customer_attach').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_events_customer_attach').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_color', function (e) {
            $('.btn_edit_color').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_color').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_color')}}",
                data: $('#form_edit_color').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_color').trigger("reset");
                        $('#edit-color').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_color').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_color').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_color').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_color').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_color').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_color').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_color', function () {
            $('#load_modal').show();
            $('#edit-color').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_color')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#id').val(data.id);
                    $('#load_modal').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_color').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_color').html(loadingText);
                    $('#edit-color').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_color', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف رنگ اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_color')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.add_customers_brands', function () {
            $('#add-customers_brands').modal('show');
        });

        $('body').on('click', '.remove_customers_brands', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف برند مشتری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_customers_brands')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.remove_events_customers', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف رویداد مشتری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_events_customers')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.btn_edit_customers_brands', function (e) {
            $('.btn_edit_customers_brands').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_customers_brands').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_customers_brands')}}",
                data: $('#form_edit_customers_brands').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_customers_brands').trigger("reset");
                        $('#edit-customers_brands').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers_brands').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers_brands').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_customer_id) {
                            msg = data.errors.edit_customer_id;
                        }
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers_brands').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers_brands').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers_brands').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_brands').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_customers_brands', function () {
            $('.edit_customer_id').empty();
            $('#load_modal_brands').show();
            $('#edit-customers_brands').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_customers_brands')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.customers.length; i++) {
                        $('.edit_customer_id_brands').append(
                            "<option value='" + data.customers[i].id + "'>" + data.customers[i].name + "</option>"
                        );
                    }


                    $('.edit_customer_id_brands').val(data.data.customer_id);
                    $('.edit_code_brands').val(data.data.code);
                    $('.edit_name_brands').val(data.data.name);
                    $('.id_brands').val(data.data.id);
                    $('#load_modal_brands').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers_brands').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_brands').html(loadingText);
                    $('#edit-customers_brands').modal('hide');
                    $('#load_modal_brands').fadeOut();

                }
            });
        });

        $('body').on('click', '.btn_add_customers_brands', function (e) {
            $('.btn_add_customers_brands').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_customers_brands').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_customers_brands')}}",
                data: $('#form_add_customers_brands').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_customers_brands').trigger("reset");
                        $('#add-customers_brands').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers_brands').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers_brands').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.customer_id) {
                            msg = data.errors.customer_id;
                        }
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers_brands').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers_brands').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_customers_brands').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_customers_brands').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_customers', function (e) {
            $('.btn_edit_customers').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_customers').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_customers')}}",
                data: $('#form_edit_customers').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_customers').trigger("reset");
                        $('#edit-customers').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_national_code) {
                            msg = data.errors.edit_national_code;
                        }
                        if (data.errors.edit_seller_id) {
                            msg = data.errors.edit_seller_id;
                        }
                        if (data.errors.edit_designer_id) {
                            msg = data.errors.edit_designer_id;
                        }
                        if (data.errors.edit_industrial_id) {
                            msg = data.errors.edit_industrial_id;
                        }
                        if (data.errors.edit_state_city_id) {
                            msg = data.errors.edit_state_city_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_customers', function () {
            $('#edit_seller_id').empty();
            $('#edit_designer_id').empty();
            $('#edit_industrial_id').empty();
            $('#edit_state_city_id').empty();
            $('#load_modal').show();
            $('#edit-customers').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_customers')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.users.length; i++) {
                        $('#edit_seller_id').append(
                            "<option value='" + data.users[i].id + "'>" + data.users[i].name + ' ' + data.users[i].fname + "</option>"
                        );
                    }

                    for (i = 0; i < data.users.length; i++) {
                        $('#edit_designer_id').append(
                            "<option value='" + data.users[i].id + "'>" + data.users[i].name + ' ' + data.users[i].fname + "</option>"
                        );
                    }

                    for (i = 0; i < data.industrials.length; i++) {
                        $('#edit_industrial_id').append(
                            "<option value='" + data.industrials[i].id + "'>" + data.industrials[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.state_citys.length; i++) {
                        $('#edit_state_city_id').append(
                            "<option value='" + data.state_citys[i].id + "'>" + data.state_citys[i].country + ' ' + data.state_citys[i].state + ' ' + data.state_citys[i].city + "</option>"
                        );
                    }

                    $('#edit_industrial_id').val(data.data.industrial_id);
                    $('#edit_state_city_id').val(data.data.state_city_id);
                    $('#edit_seller_id').val(data.data.seller_id);
                    $('#edit_designer_id').val(data.data.designer_id);
                    $('#edit_code').val(data.data.code);
                    $('#edit_name').val(data.data.name);
                    $('#edit_national_code').val(data.data.national_code);
                    $('#edit_economic_code').val(data.data.economic_code);
                    $('#edit_tel_central_office').val(data.data.tel_central_office);
                    $('#edit_tel_factory').val(data.data.tel_factory);
                    $('#edit_fax_central_office').val(data.data.fax_central_office);
                    $('#edit_fax_factory').val(data.data.fax_factory);
                    $('#edit_address_central_office').val(data.data.address_central_office);
                    $('#edit_address_factory').val(data.data.address_factory);
                    $('#edit_other_tel_central_office').val(data.data.other_tel_central_office);
                    $('#edit_other_tel_factory').val(data.data.other_tel_factory);
                    $('#edit_credit_limit').val(data.data.credit_limit);
                    $('#edit_open_account_ceiling').val(data.data.open_account_ceiling);
                    $('#edit_maximum_allowed_order_check_mode').val(data.data.maximum_allowed_order_check_mode);

                    $('#id').val(data.data.id);
                    $('.load_modal').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers').html(loadingText);
                    $('#edit-customers').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.add_customers_agent', function () {
            $('#add-customers_agent').modal('show');
        });

        $('body').on('click', '.btn_add_customers_agent', function (e) {
            $('.btn_add_customers_agent').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_customers_agent').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_customers_agent')}}",
                data: $('#form_add_customers_agent').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_customers_agent').trigger("reset");
                        $('#add-customers_agent').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers_agent').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers_agent').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.customer_id) {
                            msg = data.errors.customer_id;
                        }
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.side) {
                            msg = data.errors.side;
                        }
                        if (data.errors.phone) {
                            msg = data.errors.phone;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers_agent').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers_agent').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_customers_agent').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_customers_agent').html(loadingText);
                }
            });
        });

        $('body').on('click', '.remove_customers_agent', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف نماینده مشتری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_customers_agent')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.btn_edit_customers_agent', function (e) {
            $('.btn_edit_customers_agent').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_customers_agent').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_customers_agent')}}",
                data: $('#form_edit_customers_agent').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_customers_agent').trigger("reset");
                        $('#edit-customers_agent').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers_agent').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers_agent').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_customer_id) {
                            msg = data.errors.edit_customer_id;
                        }
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_side) {
                            msg = data.errors.edit_side;
                        }
                        if (data.errors.edit_phone) {
                            msg = data.errors.edit_phone;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_customers_agent').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_customers_agent').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers_agent').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_agent').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_customers_agent', function () {
            $('.edit_customer_id_agents').empty();
            $('#load_modal_agents').show();
            $('#edit-customers_agent').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_customers_agent')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.customers.length; i++) {
                        $('.edit_customer_id_agents').append(
                            "<option value='" + data.customers[i].id + "'>" + data.customers[i].name + '_' + data.customers[i].code + "</option>"
                        );
                    }


                    $('.edit_customer_id_agents').val(data.data.customer_id);
                    $('.edit_code_agents').val(data.data.code);
                    $('.edit_name_agents').val(data.data.name);
                    $('.edit_side_agents').val(data.data.side);
                    $('.edit_phone_agents').val(data.data.phone);
                    $('.id_agents').val(data.data.id);
                    $('#load_modal_agents').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_customers_agent').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_agent').html(loadingText);
                    $('#edit-customers_agent').modal('hide');
                    $('#load_modal_agents').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_events_customers_detail_attach', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف فایل اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_customers_events_detail')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            $('#table_see_customers_events_detail').html(data.output);
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.remove_events_customers_detail_attach_all', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف جزییات رویداد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_events_customers_detail_attach_all')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            $('#events_detail_table').html(data.output);
                            $('#edit_events_detail_table').html(data.output);
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.edit_events_customers_detail_attach_all', function () {


            $('#edit_events_file_detail').empty();
            $('#load_modal_edit_events_customer_attach').show();
            $('#edit-events_customer_attach').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_events_customer_attach')}}",
                data: {id},
                type: 'POST',
                success: function (data) {


                    myDropzone_edit_detail.processQueue();

                    for (i = 0; i < data.events_customers_detail_attach.length; i++) {
                        var asset_file = "/" + data.events_customers_detail_attach[i].file;
                        var mockFile = {
                            name: data.events_customers_detail_attach[i].file,
                            size: '',
                            width: '100px',
                            type: '',
                            viewLink: "events_customers_detail_attach/" + data.events_customers_detail_attach[i].file,
                            nominationId: '',
                            id: '',
                            media: "",

                        };
                        myDropzone_edit_detail.emit("addedfile", mockFile);
                        myDropzone_edit_detail.emit("thumbnail", mockFile, `{{ asset('events_customers_detail_attach/') }}${asset_file}`);
                        myDropzone_edit_detail.emit("complete", mockFile);
                    }


                    $('#edit_text').val(data.events_customers_detail.text);
                    $('#edit_id_events_customers').val(data.events_customers_detail.id);


                    $('#load_modal_edit_events_customer_attach').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });

                    $('#edit-events_customer_attach').modal('hide');
                    $('#load_modal_edit_events_customer_attach').fadeOut();

                }
            });
        });

        $('body').on('click', '.btn_edit_events_customer_attach', function (e) {
            $('.btn_edit_events_customer_attach').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_events_customer_attach').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_edit_events_customer_attach')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_edit_events_customer_attach')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        myDropzone_edit_detail.processQueue();

                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });

                    } else {
                        var msg;
                        if (data.errors.edit_text) {
                            msg = data.errors.edit_text;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_customer_attach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_customer_attach').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_events_customer_attach').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_customer_attach').html(loadingText);
                }
            });
        });

        $('body').on('click', '.add_reminder', function () {
            $('#load_modal_add_reminder').show();
            $('#add-reminder').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('reminder')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#table_reminder').html(data);
                    $('#load_modal_add_reminder').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });

                    $('#add-reminder').modal('hide');
                    $('#load_modal_add_reminder').fadeOut();

                }
            });

        });

        $('body').on('click', '.btn_add_reminder', function () {
            $('#add-reminder_form').modal('show');
        });

        $('body').on('click', '.btn_post_reminder', function (e) {
            $('.btn_post_reminder').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_post_reminder').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_reminder')}}",
                data: $('#form_add_reminder').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        $('#table_reminder').html(data.output);

                        $('#form_add_reminder').trigger("reset");
                        $('#add-reminder_form').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_post_reminder').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_post_reminder').html(loadingText);


                    } else {
                        var msg;
                        if (data.errors.title) {
                            msg = data.errors.title;
                        }
                        if (data.errors.date_in) {
                            msg = data.errors.date_in;
                        }
                        if (data.errors.date_to) {
                            msg = data.errors.date_to;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_post_reminder').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_post_reminder').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_post_reminder').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_post_reminder').html(loadingText);
                }
            });
        });

        $('body').on('click', '.remove_reminder', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف اعلان اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_reminder')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            $('#table_reminder').html(data.output);

                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.edit_reminder', function () {

            $('#load_modal_edit_reminder_form').show();
            $('#edit-reminder_form').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_reminder')}}",
                data: {id},
                type: 'GET',
                success: function (data) {

                    $('#edit_title').val(data.title);
                    $('#edit_text_d').val(data.text);
                    $('#edit_date_in').val(data.date_in);
                    $('#edit_time_in').val(data.time_in);
                    $('#edit_date_to').val(data.date_to);
                    $('#edit_time_to').val(data.time_to);
                    $('#edit_repeat').val(data.repeat);
                    $('#edit_latest_show').val(data.latest_show);
                    $('#edit_show_time_day').val(data.show_time_day);
                    $('#edit_show_day').val(data.show_day);
                    $('#edit_daily_reminder').val(data.daily_reminder);
                    $('#edit_hourly_reminder').val(data.hourly_reminder);
                    $('#edit_link').val(data.link);
                    $('#id_edit_reminder').val(data.id);


                    $('#load_modal_edit_reminder_form').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });

                    $('#edit-reminder_form').modal('hide');
                    $('#load_modal_edit_reminder_form').fadeOut();

                }
            });
        });

        $('body').on('click', '.btn_edit_post_reminder', function (e) {
            $('.btn_edit_post_reminder').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_post_reminder').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_edit_data_reminder')}}",
                data: $('#form_edit_reminder').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        $('#table_reminder').html(data.output);

                        $('#form_add_reminder').trigger("reset");
                        $('#edit-reminder_form').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_post_reminder').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_post_reminder').html(loadingText);


                    } else {
                        var msg;
                        if (data.errors.edit_title) {
                            msg = data.errors.edit_title;
                        }
                        if (data.errors.edit_date_in) {
                            msg = data.errors.edit_date_in;
                        }
                        if (data.errors.edit_date_to) {
                            msg = data.errors.edit_date_to;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_post_reminder').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_post_reminder').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_post_reminder').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_post_reminder').html(loadingText);
                }
            });
        });



        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });


</script>
<script>

    $("#time_in").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });
    $("#time_to").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });
    $("#show_time_day").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });


    $("#edit_time_in").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });
    $("#edit_time_to").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });
    $("#edit_show_time_day").inputmask("hh:mm",{
        placeholder: "00:00",
        insertMode: true,
        showMaskOnHover: true,
        alias: "datetime",
        inputFormat: "HH:MM"
    });



    $('.show_day').select2({
        dropdownParent: $('#add-reminder_form'),
        language: {
            noResults: function () {
                return 'روزی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.repeat').select2({
        dropdownParent: $('#add-reminder_form'),
        language: {
            noResults: function () {
                return 'نوع تکرار با این مشخصات یافت نشد!'
            }
        }
    });
    $('.events_type_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'رویدادی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.negotiator_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'کاربری با این مشخصات یافت نشد!'
            }
        }
    });
    $('.events_subject_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'موضوعی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.events_result_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'نتیجه با این مشخصات یافت نشد!'
            }
        }
    });
    $('.events_result_reason_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'دلیل با این مشخصات یافت نشد!'
            }
        }
    });
    $('.user_id').select2({
        dropdownParent: $('#add-events_customer'),
        language: {
            noResults: function () {
                return 'کاربری با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_seller_id').select2({
        dropdownParent: $('#edit-customers'),
        language: {
            noResults: function () {
                return 'فروشنده با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_designer_id').select2({
        dropdownParent: $('#edit-customers'),
        language: {
            noResults: function () {
                return 'طراح با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_industrial_id').select2({
        dropdownParent: $('#edit-customers'),
        language: {
            noResults: function () {
                return 'صنایع با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_state_city_id').select2({
        dropdownParent: $('#edit-customers'),
        language: {
            noResults: function () {
                return 'منطقه با این مشخصات یافت نشد!'
            }
        }
    });

    $('.customer_id_brands').select2({
        dropdownParent: $('#add-customers_brands'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });

    $('.customer_id_agents').select2({
        dropdownParent: $('#add-customers_agent'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_customer_id_brands').select2({
        dropdownParent: $('#edit-customers_brands'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_customer_id_agents').select2({
        dropdownParent: $('#edit-customers_agent'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_events_type_id').select2({
        dropdownParent: $('#edit-events_customer'),
        language: {
            noResults: function () {
                return 'رویدادی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_negotiator_id').select2({
        dropdownParent: $('#edit-events_customer'),
        language: {
            noResults: function () {
                return 'کاربری با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_events_subject_id').select2({
        dropdownParent: $('#edit-events_customer'),
        language: {
            noResults: function () {
                return 'موضوعی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_events_result_id').select2({
        dropdownParent: $('#edit-events_customer'),
        language: {
            noResults: function () {
                return 'نتیجه با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_events_result_reason_id').select2({
        dropdownParent: $('#edit-events_customer'),
        language: {
            noResults: function () {
                return 'دلیل با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_show_day').select2({
        dropdownParent: $('#edit-reminder_form'),
        language: {
            noResults: function () {
                return 'روزی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_repeat').select2({
        dropdownParent: $('#edit-reminder_form'),
        language: {
            noResults: function () {
                return 'نوع تکرار با این مشخصات یافت نشد!'
            }
        }
    });

</script>
<script>
    kamaDatepicker('date', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });
    kamaDatepicker('edit_date', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });

    kamaDatepicker('date_in', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });

    kamaDatepicker('date_to', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });


    kamaDatepicker('edit_date_in', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });

    kamaDatepicker('edit_date_to', {
        buttonsColor: "red",
        forceFarsiDigits: false,
        sync: true,
        gotoToday: true,
        highlightSelectedDay: true,
        markHolidays: true,
        markToday: true,
        previousButtonIcon: 'fa fa-arrow-circle-left',
        nextButtonIcon: 'fa fa-arrow-circle-right',
    });
</script>
