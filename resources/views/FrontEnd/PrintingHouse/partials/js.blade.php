<script type="text/javascript">


    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('printing_house')}}",
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

        $('body').on('click', '.add_printing_house', function () {
            $('#add-printing_house').modal('show');
        });

        $('body').on('click', '.btn_add_printing_house', function (e) {
            $('.btn_add_printing_house').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_printing_house').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_printing_house')}}",
                data: $('#form_add_printing_house').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_printing_house').trigger("reset");
                        $('#add-printing_house').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_printing_house').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_printing_house').html(loadingText);
                    } else if (data.status == 0) {
                        var msg;
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.phone) {
                            msg = data.errors.phone;
                        }
                        if (data.errors.connector) {
                            msg = data.errors.connector;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_printing_house').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_printing_house').html(loadingText);
                    }else{
                        tata.error('خطا', data.error, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_printing_house').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_printing_house').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_printing_house', function (e) {
            $('.btn_edit_printing_house').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_printing_house').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_printing_house')}}",
                data: $('#form_edit_printing_house').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_printing_house').trigger("reset");
                        $('#edit-printing_house').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_printing_house').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_printing_house').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_phone) {
                            msg = data.errors.edit_phone;
                        }
                        if (data.errors.edit_connector) {
                            msg = data.errors.edit_connector;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_printing_house').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_printing_house').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_printing_house').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_printing_house').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_printing_house', function () {
            $('#load_modal').show();
            $('#edit-printing_house').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_printing_house')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#edit_code').val(data.code);
                    $('#edit_phone').val(data.phone);
                    $('#edit_connector').val(data.connector);
                    $('#edit_address').val(data.address);
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
                    $('.btn_edit_printing_house').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_printing_house').html(loadingText);
                    $('#edit-printing_house').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_printing_house', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف چاپخانه اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_printing_house')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            load_table();
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });

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

        $('#basic_li_printing_house').addClass("active");

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
