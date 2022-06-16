<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('product_packing')}}",
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

        $('body').on('click', '.add_product_packing', function () {
            $('#add-product_packing').modal('show');
        });

        $('body').on('click', '.btn_add_product_packing', function (e) {
            $('.btn_add_product_packing').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_product_packing').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_product_packing')}}",
                data: $('#form_add_product_packing').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_product_packing').trigger("reset");
                        $('#add-product_packing').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_packing').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.product_id) {
                            msg = data.errors.product_id;
                        }
                        if (data.errors.essentials_packing_id) {
                            msg = data.errors.essentials_packing_id;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_packing').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_product_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product_packing').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_product_packing', function (e) {
            $('.btn_edit_product_packing').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_product_packing').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_product_packing')}}",
                data: $('#form_edit_product_packing').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_product_packing').trigger("reset");
                        $('#edit-product_packing').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_packing').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.product_id) {
                            msg = data.errors.product_id;
                        }
                        if (data.errors.essentials_packing_id) {
                            msg = data.errors.essentials_packing_id;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_packing').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_product_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_packing').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_product_packing', function () {
            $('#edit_product_id').empty();
            $('#edit_essentials_packing_id').empty();
            $('#load_modal').show();
            $('#edit-product_packing').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_product_packing')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.essentials_packings.length; i++) {
                        $('#edit_essentials_packing_id').append(
                            "<option value='" + data.essentials_packings[i].id + "'>" + data.essentials_packings[i].essentials_packing_type.name + ' ' + data.essentials_packings[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.products.length; i++) {
                        $('#edit_product_id').append(
                            "<option value='" + data.products[i].id + "'>" + data.products[i].name + "</option>"
                        );
                    }


                    $('#edit_essentials_packing_id').val(data.data.essentials_packing_id);
                    $('#edit_product_id').val(data.data.product_id);
                    $('#edit_number_products_package').val(data.data.number_products_package);
                    $('#edit_number_cartons_package').val(data.data.number_cartons_package);
                    $('#edit_number_packages_pallet').val(data.data.number_packages_pallet);
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
                    $('.btn_edit_product_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_packing').html(loadingText);
                    $('#edit-product_packing').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_product_packing', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف بسته بندی محصول اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_product_packing')}}",
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
        $('#basic_li_product_packing').addClass("active");
        $('#basic_li_essentials_all').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.essentials_packing_id').select2({
        dropdownParent: $('#add-product_packing'),
        language: {
            noResults: function () {
                return ' بسته بندی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.product_id').select2({
        dropdownParent: $('#add-product_packing'),
        language: {
            noResults: function () {
                return ' محصولی با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_essentials_packing_id').select2({
        dropdownParent: $('#edit-product_packing'),
        language: {
            noResults: function () {
                return ' بسته بندی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_product_id').select2({
        dropdownParent: $('#edit-product_packing'),
        language: {
            noResults: function () {
                return ' محصولی با این مشخصات یافت نشد!'
            }
        }
    });


</script>
