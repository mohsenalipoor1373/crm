<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('product_shape')}}",
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

        $('body').on('click', '.add_product_shape', function () {
            $('#add-product_shape').modal('show');
        });

        $('body').on('click', '.btn_add_product_shape', function (e) {
            $('.btn_add_product_shape').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_product_shape').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_product_shape')}}",
                data: $('#form_add_product_shape').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_product_shape').trigger("reset");
                        $('#add-product_shape').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_product_shape').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_shape').html(loadingText);
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
                        $('.btn_add_product_shape').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_product_shape').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_product_shape').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product_shape').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_product_shape', function (e) {
            $('.btn_edit_product_shape').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_product_shape').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_product_shape')}}",
                data: $('#form_edit_product_shape').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_product_shape').trigger("reset");
                        $('#edit-product_shape').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_product_shape').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_shape').html(loadingText);
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
                        $('.btn_edit_product_shape').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_product_shape').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_product_shape').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_product_shape').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_product_shape', function () {
            $('#load_modal').show();
            $('#edit-product_shape').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_product_shape')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#edit_name_en').val(data.name_en);
                    $('#edit_code').val(data.code);
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
                    $('.btn_add_product_shape').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_product_shape').html(loadingText);
                    $('#edit-product_shape').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_product_shape', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف شکل محصول اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_product_shape')}}",
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
        $('#basic_li_product_shape').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
