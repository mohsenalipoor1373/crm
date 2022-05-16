<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('product_accessories')}}",
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

        $('body').on('click', '.add_product_accessories', function () {
            $('#add-product_accessories').modal('show');
        });

        $('body').on('click', '.btn_add_product_accessories', function (e) {
            $('.btn_add_product_accessories').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_product_accessories').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_product_accessories')}}",
                data: $('#form_add_product_accessories').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_product_accessories').trigger("reset");
                        $('#add-product_accessories').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_accessories').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_accessories').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.product_id_parent) {
                            msg = data.errors.product_id_parent;
                        }
                        if (data.errors.product_id) {
                            msg = data.errors.product_id;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_accessories').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_accessories').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_product_accessories').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product_accessories').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_product_accessories', function (e) {
            $('.btn_edit_product_accessories').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_product_accessories').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_product_accessories')}}",
                data: $('#form_edit_product_accessories').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_product_accessories').trigger("reset");
                        $('#edit-product_accessories').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_accessories').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_accessories').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_color_id) {
                            msg = data.errors.edit_color_id;
                        }
                        if (data.errors.edit_masterbach_id) {
                            msg = data.errors.edit_masterbach_id;
                        }
                        if (data.errors.edit_price) {
                            msg = data.errors.edit_price;
                        }
                        if (data.errors.edit_mixing_percentage) {
                            msg = data.errors.edit_mixing_percentage;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_accessories').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_accessories').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_product_accessories').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_accessories').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_product_accessories', function () {
            $('#edit_product_id_parent').empty();
            $('#edit_product_id').empty();
            $('#load_modal').show();
            $('#edit-product_accessories').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_product_accessories')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.products.length; i++) {
                        $('#edit_product_id_parent').append(
                            "<option value='" + data.products[i].id + "'>" + data.products[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.products.length; i++) {
                        $('#edit_product_id').append(
                            "<option value='" + data.products[i].id + "'>" + data.products[i].name + "</option>"
                        );
                    }

                    $('#edit_product_id').val(data.data.product_id);
                    $('#edit_product_id_parent').val(data.data.product_id_parent);
                    $('#edit_number').val(data.data.number);
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
                    $('.btn_edit_product_accessories').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_accessories').html(loadingText);
                    $('#edit-color').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_product_accessories', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف قطعه مونتاژی اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_product_accessories')}}",
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
        $('#basic_li_product_all').addClass("active");
        $('#basic_li_product_accessories').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.product_id_parent').select2({
        dropdownParent: $('#add-product_accessories'),
        language: {
            noResults: function () {
                return 'محصولی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.product_id').select2({
        dropdownParent: $('#add-product_accessories'),
        language: {
            noResults: function () {
                return 'محصولی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_id_parent').select2({
        dropdownParent: $('#edit-product_accessories'),
        language: {
            noResults: function () {
                return 'محصولی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_id').select2({
        dropdownParent: $('#edit-product_accessories'),
        language: {
            noResults: function () {
                return 'محصولی با این مشخصات یافت نشد!'
            }
        }
    });

</script>
