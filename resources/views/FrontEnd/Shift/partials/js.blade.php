<script type="text/javascript">


    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('shift')}}",
                success: function (res) {
                    $('#TableData').html(res);
                    $('.data-table').DataTable({
                        'paging': true,
                        'searching': true,
                        'ordering': false,
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
            'paging': true,
            'searching': true,
            'ordering': false,
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

        $('body').on('click', '.add_shift', function () {
            $('#add-shift').modal('show');
        });

        $('body').on('click', '.btn_add_shift', function (e) {
            $('.btn_add_shift').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_shift').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_shift')}}",
                data: $('#form_add_shift').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_shift').trigger("reset");
                        $('#add-shift').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_shift').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_shift').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.time_in) {
                            msg = data.errors.time_in;
                        }
                        if (data.errors.date_in) {
                            msg = data.errors.date_in;
                        }
                        if (data.errors.time_to) {
                            msg = data.errors.time_to;
                        }
                        if (data.errors.date_to) {
                            msg = data.errors.date_to;
                        }
                        if (data.errors.length) {
                            msg = data.errors.length;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_shift').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_shift').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_shift').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_shift').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_shift', function (e) {
            $('.btn_edit_shift').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_shift').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_shift')}}",
                data: $('#form_edit_shift').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_shift').trigger("reset");
                        $('#edit-shift').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_shift').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_shift').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_time_in) {
                            msg = data.errors.edit_time_in;
                        }
                        if (data.errors.edit_date_in) {
                            msg = data.errors.edit_date_in;
                        }
                        if (data.errors.edit_time_to) {
                            msg = data.errors.edit_time_to;
                        }
                        if (data.errors.edit_date_to) {
                            msg = data.errors.edit_date_to;
                        }
                        if (data.errors.edit_length) {
                            msg = data.errors.edit_length;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_shift').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_shift').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_shift').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_shift').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_shift', function () {
            $('#load_modal').show();
            $('#edit-shift').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_shift')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#edit_time_in').val(data.time_in);
                    $('#edit_date_in').val(data.date_in);
                    $('#edit_time_to').val(data.time_to);
                    $('#edit_date_to').val(data.date_to);
                    $('#edit_length').val(data.length);
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
                    $('.btn_edit_shift').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_shift').html(loadingText);
                    $('#edit-shift').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_shift', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف شیفت اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_shift')}}",
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

        $('#users_li').addClass("active");

        $('#basic_li_shift').addClass("active");

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
