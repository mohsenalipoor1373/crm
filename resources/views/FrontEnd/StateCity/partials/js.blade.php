<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('state_city')}}",
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

        $('body').on('click', '.add_state_city', function () {
            $('#add-state_city').modal('show');
        });

        $('body').on('click', '.btn_add_state_city', function (e) {
            $('.btn_add_state_city').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_state_city').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_state_city')}}",
                data: $('#form_add_state_city').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_state_city').trigger("reset");
                        $('#add-state_city').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_state_city').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_state_city').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.country) {
                            msg = data.errors.country;
                        }
                        if (data.errors.state) {
                            msg = data.errors.state;
                        }
                        if (data.errors.city) {
                            msg = data.errors.city;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_state_city').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_state_city').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_state_city').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_state_city').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_state_city', function (e) {
            $('.btn_edit_state_city').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_state_city').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_state_city')}}",
                data: $('#form_edit_state_city').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_state_city').trigger("reset");
                        $('#edit-state_city').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_state_city').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_state_city').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_country) {
                            msg = data.errors.edit_country;
                        }
                        if (data.errors.edit_state) {
                            msg = data.errors.edit_state;
                        }
                        if (data.errors.edit_city) {
                            msg = data.errors.edit_city;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_state_city').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_state_city').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_state_city').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_state_city').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_state_city', function () {
            $('#load_modal').show();
            $('#edit-state_city').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_state_city')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_country').val(data.country);
                    $('#edit_state').val(data.state);
                    $('#edit_city').val(data.city);
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
                    $('.btn_add_state_city').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_state_city').html(loadingText);
                    $('#edit-state_city').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_state_city', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف منطقه اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_state_city')}}",
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
        $('#basic_li_customers_all').addClass("active");
        $('#basic_li_state_city').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
