<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('events_result')}}",
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

        $('body').on('click', '.add_events_result', function () {
            $('#add-events_result').modal('show');
        });

        $('body').on('click', '.btn_add_events_result', function (e) {
            $('.btn_add_events_result').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_events_result').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_events_result')}}",
                data: $('#form_add_events_result').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_events_result').trigger("reset");
                        $('#add-events_result').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_result').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_result').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.events_subject_id) {
                            msg = data.errors.events_subject_id;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }



                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_events_result').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_events_result').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_events_result').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_events_result').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_events_result', function (e) {
            $('.btn_edit_events_result').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_events_result').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_events_result')}}",
                data: $('#form_edit_events_result').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_events_result').trigger("reset");
                        $('#edit-events_result').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_result').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_result').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_events_subject_id) {
                            msg = data.errors.edit_events_subject_id;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_events_result').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_events_result').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_events_result').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_result').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_events_result', function () {
            $('#edit_events_subject_id').empty();
            $('#load_modal').show();
            $('#edit-events_result').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_events_result')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.events_subjects.length; i++) {
                        $('#edit_events_subject_id').append(
                            "<option value='" + data.events_subjects[i].id + "'>" + data.events_subjects[i].name + "</option>"
                        );
                    }



                    $('#edit_events_subject_id').val(data.data.events_subject_id);
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
                    $('.btn_edit_events_result').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_events_result').html(loadingText);
                    $('#edit-events_result').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_events_result', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف نتیجه رویداد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_events_result')}}",
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
        $('#basic_li_events_result').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.events_subject_id').select2({
        dropdownParent: $('#add-events_result'),
        language: {
            noResults: function () {
                return 'موضوغ رویداد با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_events_subject_id').select2({
        dropdownParent: $('#edit-events_result'),
        language: {
            noResults: function () {
                return 'موضوغ رویداد با این مشخصات یافت نشد!'
            }
        }
    });


</script>
