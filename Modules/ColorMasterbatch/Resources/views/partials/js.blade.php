<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('color_masterbatch')}}",
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

        $('body').on('click', '.add_color_masterbatch', function () {
            $('#add-color_masterbatch').modal('show');
        });

        $('body').on('click', '.btn_add_color_masterbatch', function (e) {
            $('.btn_add_color_masterbatch').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_color_masterbatch').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_color_masterbatch')}}",
                data: $('#form_add_color_masterbatch').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_color_masterbatch').trigger("reset");
                        $('#add-color_masterbatch').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_color_masterbatch').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_color_masterbatch').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.color_id) {
                            msg = data.errors.color_id;
                        }
                        if (data.errors.masterbach_id) {
                            msg = data.errors.masterbach_id;
                        }
                        if (data.errors.price) {
                            msg = data.errors.price;
                        }
                        if (data.errors.mixing_percentage) {
                            msg = data.errors.mixing_percentage;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_color_masterbatch').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_color_masterbatch').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_color_masterbatch').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_color_masterbatch').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_color_masterbatch', function (e) {
            $('.btn_edit_colorcolor_masterbatch').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_color_masterbatch').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_color_masterbatch')}}",
                data: $('#form_edit_color_masterbatch').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_color_masterbatch').trigger("reset");
                        $('#edit-color_masterbatch').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_color_masterbatch').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_color_masterbatch').html(loadingText);
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
                        $('.btn_edit_color_masterbatch').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_color_masterbatch').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_color_masterbatch').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_color_masterbatch').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_color_masterbatch', function () {
            $('#edit_color_id').empty();
            $('#edit_masterbach_id').empty();
            $('#load_modal').show();
            $('#edit-color_masterbatch').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_color_masterbatch')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.colors.length; i++) {
                        $('#edit_color_id').append(
                            "<option value='" + data.colors[i].id + "'>" + data.colors[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.masterbachs.length; i++) {
                        $('#edit_masterbach_id').append(
                            "<option value='" + data.masterbachs[i].id + "'>" + data.masterbachs[i].name + "</option>"
                        );
                    }

                    $('#edit_mixing_percentage').val(data.data.mixing_percentage);
                    $('#edit_price').val(data.data.price);
                    $('#edit_masterbach_id').val(data.data.masterbatch_id);
                    $('#edit_color_id').val(data.data.color_id);
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
                    $('.btn_edit_color_masterbatch').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_color_masterbatch').html(loadingText);
                    $('#edit-color').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_color_masterbatch', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف رنگ و مستربچ اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_color_masterbatch')}}",
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
        $('body').on('click', '.change_color_masterbatch', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت رنگ و مستربچ اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('change_color_masterbatch')}}",
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
        $('#basic_li_color_masterbatch').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.color_id').select2({
        dropdownParent: $('#add-color_masterbatch'),
        language: {
            noResults: function () {
                return 'رنگی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.masterbach_id').select2({
        dropdownParent: $('#add-color_masterbatch'),
        language: {
            noResults: function () {
                return 'مستربچی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_color_id').select2({
        dropdownParent: $('#edit-color_masterbatch'),
        language: {
            noResults: function () {
                return 'رنگی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_masterbach_id').select2({
        dropdownParent: $('#edit-color_masterbatch'),
        language: {
            noResults: function () {
                return 'مستربچی با این مشخصات یافت نشد!'
            }
        }
    });

</script>
