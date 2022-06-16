<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('events_result_reason')}}",
                success: function (res) {
                    $('#TableData').html(res.output);
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

        $('body').on('click', '.add_events_result_reason', function () {
            $('#add-events_result_reason').modal('show');
        });

        $('body').on('click', '.btn_add_events_result_reason', function (e) {
            $('.btn_add_events_result_reason').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_events_result_reason').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_events_result_reason')}}",
                data: $('#form_add_events_result_reason').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_events_result_reason').trigger("reset");
                        $('#add-events_result_reason').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_result_reason').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_result_reason').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.events_subject_id) {
                            msg = data.errors.events_subject_id;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.events_result_id) {
                            msg = data.errors.events_result_id;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_result_reason').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_result_reason').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_events_result_reason').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_events_result_reason').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_events_result_reason', function (e) {
            $('.btn_edit_events_result_reason').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_events_result_reason').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_events_result_reason')}}",
                data: $('#form_edit_events_result_reason').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_events_result_reason').trigger("reset");
                        $('#edit-events_result_reason').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_result_reason').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_result_reason').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_events_subject_id) {
                            msg = data.errors.edit_events_subject_id;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_events_result_id) {
                            msg = data.errors.edit_events_result_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_result_reason').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_result_reason').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_events_result_reason').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_result_reason').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_events_result_reason', function () {
            $('#edit_events_subject_id').empty();
            $('#edit_events_result_id').empty();
            $('#load_modal').show();
            $('#edit-events_result_reason').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_events_result_reason')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.events_subjects.length; i++) {
                        $('#edit_events_subject_id').append(
                            "<option value='" + data.events_subjects[i].id + "'>" + data.events_subjects[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.events_results.length; i++) {
                        $('#edit_events_result_id').append(
                            "<option value='" + data.events_results[i].id + "'>" + data.events_results[i].name + "</option>"
                        );
                    }



                    $('#edit_events_subject_id').val(data.data.events_subject_id);
                    $('#edit_events_result_id').val(data.data.events_result_id);
                    $('#edit_name').val(data.data.name);
                    $('#id').val(data.data.id);
                    $('#load_modal').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_events_result_reason').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_result_reason').html(loadingText);
                    $('#edit-events_result').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_events_result_reason', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف دلیل نتیجه رویداد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_events_result_reason')}}",
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


        $('#basic_li').addClass("active");
        $('#basic_li_events_all').addClass("active");
        $('#basic_li_events_result_reason').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.events_subject_id').select2({
        dropdownParent: $('#add-events_result_reason'),
        language: {
            noResults: function () {
                return 'موضوع رویداد با این مشخصات یافت نشد!'
            }
        }
    });
    $('.events_result_id').select2({
        dropdownParent: $('#add-events_result_reason'),
        language: {
            noResults: function () {
                return 'نتیجه رویداد با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_events_subject_id').select2({
        dropdownParent: $('#edit-events_result_reason'),
        language: {
            noResults: function () {
                return 'موضوع رویداد با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_events_result_id').select2({
        dropdownParent: $('#edit-events_result_reason'),
        language: {
            noResults: function () {
                return 'نتیجه رویداد با این مشخصات یافت نشد!'
            }
        }
    });


</script>
