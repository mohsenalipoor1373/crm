<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('setting_company')}}",
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

        $('body').on('click', '.add_setting_company', function () {
            $('#add-setting_company').modal('show');
        });

        $('body').on('click', '.btn_add_setting_company', function (e) {
            $('.btn_add_setting_company').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_setting_company').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_add_setting_company')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_setting_company')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_setting_company').trigger("reset");
                        $('#add-setting_company').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_setting_company').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_setting_company').html(loadingText);
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
                        $('.btn_add_setting_company').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_setting_company').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_setting_company').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_setting_company').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_setting_company', function (e) {
            $('.btn_edit_setting_company').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_setting_company').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_edit_setting_company')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_edit_setting_company')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_setting_company').trigger("reset");
                        $('#edit-setting_company').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_setting_company').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_setting_company').html(loadingText);
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
                        $('.btn_edit_setting_company').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_setting_company').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_setting_company').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_setting_company').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_setting_company', function () {
            $('#load_modal').show();
            $('#edit-setting_company').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_setting_company')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#edit_tel_central_office').val(data.tel_central_office);
                    $('#edit_fax_central_office').val(data.fax_central_office);
                    $('#edit_office_email').val(data.office_email);
                    $('#edit_address_central_office').val(data.address_central_office);
                    $('#edit_factory_main_phone').val(data.factory_main_phone);
                    $('#edit_factory_fox').val(data.factory_fox);
                    $('#edit_factory_email').val(data.factory_email);
                    $('#edit_factory_address').val(data.factory_address);
                    $('#edit_other_office_phone').val(data.other_office_phone);
                    $('#edit_other_factory_phone').val(data.other_factory_phone);
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
                    $('.btn_add_setting_company').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_setting_company').html(loadingText);
                    $('#edit-setting_company').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_setting_company', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف تنظیمات شرکت اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_setting_company')}}",
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
        $('#basic_li_setting_company').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
