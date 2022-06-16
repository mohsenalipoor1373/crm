<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('product')}}",
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

        $('body').on('click', '.add_product', function () {
            $('#add-product').modal('show');
        });

        $('body').on('click', '.btn_add_product', function (e) {
            $('.btn_add_product').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_product').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_product')}}",
                data: $('#form_add_product').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_product').trigger("reset");
                        $('#add-product').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product').html(loadingText);
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
                        $('.btn_add_product').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_product').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_product', function (e) {
            $('.btn_edit_product').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_product').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_product')}}",
                data: $('#form_edit_product').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_product').trigger("reset");
                        $('#edit-product').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product').html(loadingText);
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
                        $('.btn_edit_product').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_product').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_product', function () {
            $('#edit_product_type_id').empty();
            $('#edit_product_shape_id').empty();
            $('#edit_product_index_id').empty();
            $('#edit_product_dim_id').empty();
            $('#load_modal').show();
            $('#edit-product').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_product')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.product_types.length; i++) {
                        $('#edit_product_type_id').append(
                            "<option value='" + data.product_types[i].id + "'>" + data.product_types[i].name + "</option>"
                        );
                    }
                    for (i = 0; i < data.product_shapes.length; i++) {
                        $('#edit_product_shape_id').append(
                            "<option value='" + data.product_shapes[i].id + "'>" + data.product_shapes[i].name + "</option>"
                        );
                    }
                    for (i = 0; i < data.product_indexs.length; i++) {
                        $('#edit_product_index_id').append(
                            "<option value='" + data.product_indexs[i].id + "'>" + data.product_indexs[i].name + "</option>"
                        );
                    }
                    for (i = 0; i < data.product_dims.length; i++) {
                        $('#edit_product_dim_id').append(
                            "<option value='" + data.product_dims[i].id + "'>" + data.product_dims[i].name + "</option>"
                        );
                    }
                    $('#edit_product_type_id').val(data.data.product_type_id);
                    $('#edit_product_shape_id').val(data.data.product_shape_id);
                    $('#edit_product_index_id').val(data.data.product_index_id);
                    $('#edit_product_dim_id').val(data.data.product_dim_id);
                    $('#edit_weight').val(data.data.weight);
                    $('#edit_wage').val(data.data.wage);
                    $('#edit_per_sale').val(data.data.per_sale);
                    $('#edit_production_capacity').val(data.data.production_capacity);
                    $('#edit_place_production').val(data.data.place_production);
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
                    $('.btn_edit_product').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product').html(loadingText);
                    $('#edit-product').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_product', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف محصول اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_product')}}",
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
        $('body').on('click', '.change_product', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت محصول اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('change_product')}}",
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
        $('#basic_li_product').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.product_type_id').select2({
        dropdownParent: $('#add-product'),
        language: {
            noResults: function () {
                return 'نوع محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.product_shape_id').select2({
        dropdownParent: $('#add-product'),
        language: {
            noResults: function () {
                return 'شکل محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.product_index_id').select2({
        dropdownParent: $('#add-product'),
        language: {
            noResults: function () {
                return 'شاخص محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.product_dim_id').select2({
        dropdownParent: $('#add-product'),
        language: {
            noResults: function () {
                return 'سایز دهانه محصول با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_product_type_id').select2({
        dropdownParent: $('#edit-product'),
        language: {
            noResults: function () {
                return 'نوع محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_shape_id').select2({
        dropdownParent: $('#edit-product'),
        language: {
            noResults: function () {
                return 'شکل محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_index_id').select2({
        dropdownParent: $('#edit-product'),
        language: {
            noResults: function () {
                return 'شاخص محصول با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_dim_id').select2({
        dropdownParent: $('#edit-product'),
        language: {
            noResults: function () {
                return 'سایز دهانه محصول با این مشخصات یافت نشد!'
            }
        }
    });

</script>
