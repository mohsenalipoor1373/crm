<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('setting_checkout')}}",
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

        $('body').on('click', '.add_setting_checkout', function () {
            $('#add-setting_checkout').modal('show');
        });

        $('body').on('click', '.btn_add_setting_checkout', function (e) {
            $('.btn_add_setting_checkout').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_setting_checkout').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_setting_checkout')}}",
                data: $('#form_add_setting_checkout').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_setting_checkout').trigger("reset");
                        $('#add-setting_checkout').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_setting_checkout').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_setting_checkout').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_setting_checkout').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_setting_checkout').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_setting_checkout').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_setting_checkout').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_setting_checkout', function (e) {
            $('.btn_edit_setting_checkout').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_setting_checkout').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_setting_checkout')}}",
                data: $('#form_edit_setting_checkout').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_setting_checkout').trigger("reset");
                        $('#edit-setting_checkout').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_setting_checkout').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_setting_checkout').html(loadingText);
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
                        $('.btn_edit_setting_checkout').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_setting_checkout').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_setting_checkout').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_setting_checkout').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_setting_checkout', function () {
            $('#load_modal').show();
            $('#edit-setting_checkout').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_setting_checkout')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_type').val(data.type);
                    $('#edit_status').val(data.status);
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
                    $('.btn_add_setting_checkout').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_setting_checkout').html(loadingText);
                    $('#edit-setting_checkout').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_setting_checkout', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف تنظیمات اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_setting_checkout')}}",
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
        $('#basic_li_setting_all').addClass("active");
        $('#basic_li_setting_checkout').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
<script>
    $('.status').select2({
        dropdownParent: $('#add-setting_checkout'),
        language: {
            noResults: function () {
                return 'وضعیتی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_status').select2({
        dropdownParent: $('#edit-setting_checkout'),
        language: {
            noResults: function () {
                return 'وضعیتی با این مشخصات یافت نشد!'
            }
        }
    });

</script>
