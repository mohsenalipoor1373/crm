<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('quality_materials')}}",
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

        $('body').on('click', '.add_quality_materials', function () {
            $('#add-quality_materials').modal('show');
        });

        $('body').on('click', '.btn_add_quality_materials', function (e) {
            $('.btn_add_quality_materials').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_quality_materials').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_quality_materials')}}",
                data: $('#form_add_quality_materials').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_quality_materials').trigger("reset");
                        $('#add-quality_materials').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_quality_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_quality_materials').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.name) {
                            msg = data.errors.name;
                        } if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_quality_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_quality_materials').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_quality_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_quality_materials').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_quality_materials', function (e) {
            $('.btn_edit_quality_materials').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_quality_materials').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_quality_materials')}}",
                data: $('#form_edit_quality_materials').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_quality_materials').trigger("reset");
                        $('#edit-quality_materials').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_quality_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_quality_materials').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_quality_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_quality_materials').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_quality_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_quality_materials').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_quality_materials', function () {
            $('#load_modal').show();
            $('#edit-quality_materials').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_quality_materials')}}",
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
                    $('.btn_add_quality_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_quality_materials').html(loadingText);
                    $('#edit-quality_materials').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_quality_materials', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف درجه کیفی مواد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_quality_materials')}}",
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
        $('#basic_li_quality_materials').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });


</script>
