<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('customers_agent')}}",
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
            $('#edit_customer_id').empty();
            $('#load_modal').show();
            $('#edit-customers_agent').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_customers_agent')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.customers.length; i++) {
                        $('#edit_customer_id').append(
                            "<option value='" + data.customers[i].id + "'>" + data.customers[i].name + '_' + data.customers[i].code + "</option>"
                        );
                    }


                    $('#edit_customer_id').val(data.data.customer_id);
                    $('#edit_code').val(data.data.code);
                    $('#edit_name').val(data.data.name);
                    $('#edit_side').val(data.data.side);
                    $('#edit_phone').val(data.data.phone);
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
                    $('.btn_edit_customers_agent').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_customers_agent').html(loadingText);
                    $('#edit-customers_agent').modal('hide');
                    $('#load_modal').fadeOut();

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


        $('#basic_li').addClass("active");
        $('#basic_li_customers_agent').addClass("active");
        $('#basic_li_customers_all').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.customer_id').select2({
        dropdownParent: $('#add-customers_agent'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_customer_id').select2({
        dropdownParent: $('#edit-customers_agent'),
        language: {
            noResults: function () {
                return 'مشتری با این مشخصات یافت نشد!'
            }
        }
    });


</script>
