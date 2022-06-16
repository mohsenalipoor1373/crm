<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('label_inventory_transaction_type')}}",
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

        $('body').on('click', '.add_label_inventory_transaction_type', function () {
            $('#add-label_inventory_transaction_type').modal('show');
        });

        $('body').on('click', '.btn_add_label_inventory_transaction_type', function (e) {
            $('.btn_add_label_inventory_transaction_type').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_label_inventory_transaction_type').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_label_inventory_transaction_type')}}",
                data: $('#form_add_label_inventory_transaction_type').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_label_inventory_transaction_type').trigger("reset");
                        $('#add-label_inventory_transaction_type').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_inventory_transaction_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_inventory_transaction_type').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.type) {
                            msg = data.errors.type;
                        }
                        if (data.errors.text) {
                            msg = data.errors.text;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_inventory_transaction_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_inventory_transaction_type').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_label_inventory_transaction_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_inventory_transaction_type').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_label_inventory_transaction_type', function (e) {
            $('.btn_edit_label_inventory_transaction_type').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_label_inventory_transaction_type').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_label_inventory_transaction_type')}}",
                data: $('#form_edit_label_inventory_transaction_type').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_label_inventory_transaction_type').trigger("reset");
                        $('#edit-label_inventory_transaction_type').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_inventory_transaction_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_inventory_transaction_type').html(loadingText);
                    } else {
                        var msg;
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_type) {
                            msg = data.errors.edit_type;
                        }
                        if (data.errors.edit_text) {
                            msg = data.errors.edit_text;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_inventory_transaction_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_inventory_transaction_type').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_label_inventory_transaction_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_label_inventory_transaction_type').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_label_inventory_transaction_type', function () {
            $('#load_modal').show();
            $('#edit-label_inventory_transaction_type').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_label_inventory_transaction_type')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
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
                    $('.btn_add_label_inventory_transaction_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_inventory_transaction_type').html(loadingText);
                    $('#edit-label_inventory_transaction_type').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_label_inventory_transaction_type', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف نوع تراکنش اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_label_inventory_transaction_type')}}",
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
        $('#basic_li_material_transaction_all').addClass("active");
        $('#basic_li_label_inventory_transaction_type').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
<script>
    $('.type').select2({
        dropdownParent: $('#add-label_inventory_transaction_type'),
        language: {
            noResults: function () {
                return 'نوع تراکنشی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_type').select2({
        dropdownParent: $('#edit-label_inventory_transaction_type'),
        language: {
            noResults: function () {
                return 'نوع تراکنشی با این مشخصات یافت نشد!'
            }
        }
    });

</script>
