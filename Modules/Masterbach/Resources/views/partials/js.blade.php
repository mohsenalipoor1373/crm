<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('masterbach')}}",
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

        $('body').on('click', '.add_masterbach', function () {
            $('#add-masterbach').modal('show');
        });

        $('body').on('click', '.btn_add_masterbach', function (e) {
            $('.btn_add_masterbach').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_masterbach').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_masterbach')}}",
                data: $('#form_add_masterbach').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_masterbach').trigger("reset");
                        $('#add-masterbach').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_masterbach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_masterbach').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_masterbach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_masterbach').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_masterbach').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_masterbach').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_masterbach', function (e) {
            $('.btn_edit_masterbach').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_masterbach').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_masterbach')}}",
                data: $('#form_edit_masterbach').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_masterbach').trigger("reset");
                        $('#edit-masterbach').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_masterbach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_masterbach').html(loadingText);
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
                        $('.btn_edit_masterbach').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_masterbach').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_masterbach').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_masterbach').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_masterbach', function () {
            $('#load_modal').show();
            $('#edit-masterbach').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_masterbach')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
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
                    $('.btn_add_masterbach').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_masterbach').html(loadingText);
                    $('#edit-masterbach').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_masterbach', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف مستربچ اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_masterbach')}}",
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
        $('#basic_li_material_all').addClass("active");
        $('#basic_li_masterbach').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
