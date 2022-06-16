<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('customers')}}",
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

        $('body').on('click', '.add_customers', function () {
            $('#add-customers').modal('show');
        });

        $('body').on('click', '.btn_add_customers', function (e) {
            $('.btn_add_customers').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_customers').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_customers')}}",
                data: $('#form_add_customers').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_customers').trigger("reset");
                        $('#add-customers').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.national_code) {
                            msg = data.errors.national_code;
                        }
                        if (data.errors.seller_id) {
                            msg = data.errors.seller_id;
                        }
                        if (data.errors.designer_id) {
                            msg = data.errors.designer_id;
                        }
                        if (data.errors.industrial_id) {
                            msg = data.errors.industrial_id;
                        }
                        if (data.errors.state_city_id) {
                            msg = data.errors.state_city_id;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_customers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_customers').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_customers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_customers').html(loadingText);
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
                    $('#load_modal').fadeOut();
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

        $('body').on('click', '.remove_customers', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف مشتری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_customers')}}",
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

        $('body').on('click', '.change_customers', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت مشتری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('change_customers')}}",
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
        $('#basic_li_customers_all').addClass("active");
        $('#basic_li_customers').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.seller_id').select2({
        dropdownParent: $('#add-customers'),
        language: {
            noResults: function () {
                return 'فروشنده با این مشخصات یافت نشد!'
            }
        }
    });

    $('.designer_id').select2({
        dropdownParent: $('#add-customers'),
        language: {
            noResults: function () {
                return 'طراح با این مشخصات یافت نشد!'
            }
        }
    });
    $('.industrial_id').select2({
        dropdownParent: $('#add-customers'),
        language: {
            noResults: function () {
                return 'صنایع با این مشخصات یافت نشد!'
            }
        }
    });
    $('.state_city_id').select2({
        dropdownParent: $('#add-customers'),
        language: {
            noResults: function () {
                return 'منطقه با این مشخصات یافت نشد!'
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

</script>
