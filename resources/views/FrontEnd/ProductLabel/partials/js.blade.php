<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('product_label')}}",
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

        $('body').on('click', '.add_product_label', function () {
            $('#add-product_label').modal('show');
        });

        $('body').on('click', '.btn_add_product_label', function (e) {
            $('.btn_add_product_label').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_product_label').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_product_label')}}",
                data: $('#form_add_product_label').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_product_label').trigger("reset");
                        $('#add-product_label').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_label').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_label').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.product_type_id) {
                            msg = data.errors.product_type_id;
                        }
                        if (data.errors.product_shape_id) {
                            msg = data.errors.product_shape_id;
                        }
                        if (data.errors.product_index_id) {
                            msg = data.errors.product_index_id;
                        }
                        if (data.errors.product_dim_id) {
                            msg = data.errors.product_dim_id;
                        }
                        if (data.errors.weight) {
                            msg = data.errors.weight;
                        }
                        if (data.errors.wage) {
                            msg = data.errors.wage;
                        }
                        if (data.errors.per_sale) {
                            msg = data.errors.per_sale;
                        }
                        if (data.errors.production_capacity) {
                            msg = data.errors.production_capacity;
                        }
                        if (data.errors.place_production) {
                            msg = data.errors.place_production;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_label').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_label').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_product_label').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product_label').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_product_label', function (e) {
            $('.btn_edit_product_label').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_product_label').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_product_label')}}",
                data: $('#form_edit_product_label').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_product_label').trigger("reset");
                        $('#edit-product_label').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_label').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_label').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_product_type_id) {
                            msg = data.errors.edit_product_type_id;
                        }
                        if (data.errors.edit_product_shape_id) {
                            msg = data.errors.edit_product_shape_id;
                        }
                        if (data.errors.edit_product_index_id) {
                            msg = data.errors.edit_product_index_id;
                        }
                        if (data.errors.edit_product_dim_id) {
                            msg = data.errors.edit_product_dim_id;
                        }
                        if (data.errors.edit_weight) {
                            msg = data.errors.edit_weight;
                        }
                        if (data.errors.edit_wage) {
                            msg = data.errors.edit_wage;
                        }
                        if (data.errors.edit_per_sale) {
                            msg = data.errors.edit_per_sale;
                        }
                        if (data.errors.edit_production_capacity) {
                            msg = data.errors.edit_production_capacity;
                        }
                        if (data.errors.edit_place_production) {
                            msg = data.errors.edit_place_production;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_label').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_label').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_product_label').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_label').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_product_label', function () {
            $('#edit_product_id').empty();
            $('#edit_label_design_id').empty();
            $('#edit_color_id').empty();
            $('#load_modal').show();
            $('#edit-product_label').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_product_label')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.products.length; i++) {
                        $('#edit_product_id').append(
                            "<option value='" + data.products[i].id + "'>" + data.products[i].name + "</option>"
                        );
                    }
                    for (i = 0; i < data.label_designs.length; i++) {
                        $('#edit_label_design_id').append(
                            "<option value='" + data.label_designs[i].id + "'>" + data.label_designs[i].name + "</option>"
                        );
                    }
                    for (i = 0; i < data.colors.length; i++) {
                        $('#edit_color_id').append(
                            "<option value='" + data.colors[i].id + "'>" + data.colors[i].name + "</option>"
                        );
                    }

                    $('#edit_product_id').val(data.data.product_id);
                    $('#edit_label_design_id').val(data.data.label_design_id);
                    $('#edit_color_id').val(data.data.color_id);
                    $('#edit_code').val(data.data.code);
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
                    $('.btn_edit_product_label').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_label').html(loadingText);
                    $('#edit-product_label').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_product_label', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف محصول لیبل اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_product_label')}}",
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
        $('#basic_li_product_label').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.product_id').select2({
        dropdownParent: $('#add-product_label'),
        language: {
            noResults: function () {
                return 'محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.label_design_id').select2({
        dropdownParent: $('#add-product_label'),
        language: {
            noResults: function () {
                return 'طرح لیبل با این مشخصات یافت نشد!'
            }
        }
    });
    $('.color_id').select2({
        dropdownParent: $('#add-product_label'),
        language: {
            noResults: function () {
                return 'رنگ با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_product_id').select2({
        dropdownParent: $('#edit-product_label'),
        language: {
            noResults: function () {
                return 'محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_label_design_id').select2({
        dropdownParent: $('#edit-product_label'),
        language: {
            noResults: function () {
                return 'طرح لیبل با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_color_id').select2({
        dropdownParent: $('#edit-product_label'),
        language: {
            noResults: function () {
                return 'رنگ با این مشخصات یافت نشد!'
            }
        }
    });

</script>
