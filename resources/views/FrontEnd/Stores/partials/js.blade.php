<script type="text/javascript">

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('stores')}}",
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

        $('body').on('click', '.add_stores', function () {
            $('#add-stores').modal('show');
        });

        $('body').on('click', '.btn_add_stores', function (e) {
            $('.btn_add_stores').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_stores').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_stores')}}",
                data: $('#form_add_stores').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_stores').trigger("reset");
                        $('#add-stores').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_stores').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_stores').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.stores_type_id) {
                            msg = data.errors.stores_type_id;
                        }
                        if (data.errors.prefix) {
                            msg = data.errors.prefix;
                        }
                        if (data.errors.location) {
                            msg = data.errors.location;
                        }
                        if (data.errors.capacity_number) {
                            msg = data.errors.capacity_number;
                        }
                        if (data.errors.capacity_weight) {
                            msg = data.errors.capacity_weight;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_stores').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_stores').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_stores').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_stores').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_stores', function (e) {
            $('.btn_edit_colorstores').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_stores').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_stores')}}",
                data: $('#form_edit_stores').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_stores').trigger("reset");
                        $('#edit-stores').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_stores').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_stores').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_stores_type_id) {
                            msg = data.errors.edit_stores_type_id;
                        }
                        if (data.errors.edit_prefix) {
                            msg = data.errors.edit_prefix;
                        }
                        if (data.errors.location) {
                            msg = data.errors.location;
                        }
                        if (data.errors.edit_capacity_number) {
                            msg = data.errors.edit_capacity_number;
                        }
                        if (data.errors.edit_capacity_weight) {
                            msg = data.errors.edit_capacity_weight;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_stores').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_stores').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_stores').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_stores').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_stores', function () {
            $('#edit_stores_type_id').empty();
            $('#load_modal').show();
            $('#edit-stores').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_stores')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.storestype.length; i++) {
                        $('#edit_stores_type_id').append(
                            "<option value='" + data.storestype[i].id + "'>" + data.storestype[i].name + "</option>"
                        );
                    }



                    $('#edit_stores_type_id').val(data.data.stores_type_id);
                    $('#edit_code').val(data.data.code);
                    $('#edit_prefix').val(data.data.prefix);
                    $('#edit_location').val(data.data.location);
                    $('#edit_capacity_number').val(data.data.capacity_number);
                    $('#edit_capacity_weight').val(data.data.capacity_weight);
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
                    $('.btn_edit_stores').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_stores').html(loadingText);
                    $('#edit-stores').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_stores', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف انبار اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_stores')}}",
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
        $('#basic_li_stores_all').addClass("active");
        $('#basic_li_stores').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.stores_type_id').select2({
        dropdownParent: $('#add-stores'),
        language: {
            noResults: function () {
                return 'انباری با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_stores_type_id').select2({
        dropdownParent: $('#edit-stores'),
        language: {
            noResults: function () {
                return 'انباری با این مشخصات یافت نشد!'
            }
        }
    });

</script>
