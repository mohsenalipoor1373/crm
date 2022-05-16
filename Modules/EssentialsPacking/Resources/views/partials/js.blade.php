<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('essentials_packing')}}",
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

        $('body').on('click', '.add_essentials_packing', function () {
            $('#add-essentials_packing').modal('show');
        });

        $('body').on('click', '.btn_add_essentials_packing', function (e) {
            $('.btn_add_essentials_packing').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_essentials_packing').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_essentials_packing')}}",
                data: $('#form_add_essentials_packing').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_essentials_packing').trigger("reset");
                        $('#add-essentials_packing').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_packing').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.essentials_packing_type_id) {
                            msg = data.errors.essentials_packing_type_id;
                        }
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.size) {
                            msg = data.errors.size;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_packing').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_essentials_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_essentials_packing').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_essentials_packing', function (e) {
            $('.btn_edit_essentials_packing').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_essentials_packing').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_essentials_packing')}}",
                data: $('#form_edit_essentials_packing').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_essentials_packing').trigger("reset");
                        $('#edit-essentials_packing').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_packing').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_essentials_packing_type_id) {
                            msg = data.errors.edit_essentials_packing_type_id;
                        }
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_size) {
                            msg = data.errors.edit_size;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_packing').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_packing').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_essentials_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_essentials_packing').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_essentials_packing', function () {
            $('#edit_essentials_packing_type_id').empty();
            $('#load_modal').show();
            $('#edit-essentials_packing').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_essentials_packing')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.essentials_packing_type.length; i++) {
                        $('#edit_essentials_packing_type_id').append(
                            "<option value='" + data.essentials_packing_type[i].id + "'>" + data.essentials_packing_type[i].name + "</option>"
                        );
                    }



                    $('#edit_essentials_packing_type_id').val(data.data.essentials_packing_type_id);
                    $('#edit_code').val(data.data.code);
                    $('#edit_name').val(data.data.name);
                    $('#edit_size').val(data.data.size);
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
                    $('.btn_edit_essentials_packing').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_essentials_packing').html(loadingText);
                    $('#edit-essentials_packing').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_essentials_packing', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف ملزومات بسته بندی اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_essentials_packing')}}",
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
        $('#basic_li_essentials_packing').addClass("active");
        $('#basic_li_essentials_all').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.essentials_packing_type_id').select2({
        dropdownParent: $('#add-essentials_packing'),
        language: {
            noResults: function () {
                return 'نوع ملزوماتی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_essentials_packing_type_id').select2({
        dropdownParent: $('#edit-essentials_packing'),
        language: {
            noResults: function () {
                return 'نوع ملزوماتی با این مشخصات یافت نشد!'
            }
        }
    });


</script>
