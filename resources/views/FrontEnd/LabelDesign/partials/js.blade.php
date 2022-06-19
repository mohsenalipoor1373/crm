<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('label_design')}}",
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

        $('body').on('click', '.add_label_design', function () {
            $('#add-label_design').modal('show');
        });

        $('body').on('click', '.btn_add_label_design', function (e) {
            $('.btn_add_label_design').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_label_design').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_label_design')}}",
                data: $('#form_add_label_design').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_label_design').trigger("reset");
                        $('#add-label_design').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_design').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_design').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.customer_id) {
                            msg = data.errors.customer_id;
                        }
                        if (data.errors.label_type_id) {
                            msg = data.errors.label_type_id;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_design').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_design').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_label_design').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_design').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_label_design', function (e) {
            $('.btn_edit_label_design').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_label_design').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_label_design')}}",
                data: $('#form_edit_label_design').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_label_design').trigger("reset");
                        $('#edit-label_design').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_design').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_design').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_customer_id) {
                            msg = data.errors.edit_customer_id;
                        }
                        if (data.errors.edit_label_type_id) {
                            msg = data.errors.edit_label_type_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_design').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_design').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_label_design').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_label_design').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_label_design', function () {
            $('#load_modal').show();
            $('#edit-label_design').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_label_design')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_customer_id').empty();
                    $('#edit_label_type_id').empty();

                    for (i = 0; i < data.customers.length; i++) {
                        $('#edit_customer_id').append(
                            "<option value='" + data.customers[i].id + "'>" + data.customers[i].name + "-" + data.customers[i].code + "</option>"
                        );
                    }
                    for (i = 0; i < data.label_types.length; i++) {
                        $('#edit_label_type_id').append(
                            "<option value='" + data.label_types[i].id + "'>" + data.label_types[i].text +  "</option>"
                        );
                    }


                    $('#edit_customer_id').val(data.permissions.customer_id);
                    $('#edit_label_type_id').val(data.permissions.label_type_id);
                    $('#edit_code').val(data.permissions.code);
                    $('#edit_name').val(data.permissions.name);
                    $('#edit_text').val(data.permissions.text);
                    $('#id').val(data.permissions.id);
                    $('#load_modal').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_label_design').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_design').html(loadingText);
                    $('#edit-label_design').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_label_design', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف لیبل اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_label_design')}}",
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
        $('#basic_li_label_all').addClass("active");
        $('#basic_li_label_design').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
<script>
    $('.customer_id').select2({
        dropdownParent: $('#add-label_design'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });
    $('.label_type_id').select2({
        dropdownParent: $('#add-label_design'),
        language: {
            noResults: function () {
                return 'نوع لیبل با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_customer_id').select2({
        dropdownParent: $('#edit-label_design'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_label_type_id').select2({
        dropdownParent: $('#edit-label_design'),
        language: {
            noResults: function () {
                return 'نوع لیبل با این مشخصات یافت نشد!'
            }
        }
    });
</script>
