<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('essentials_packing_type')}}",
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

        $('body').on('click', '.add_essentials_packing_type', function () {
            $('#add-essentials_packing_type').modal('show');
        });

        $('body').on('click', '.btn_add_essentials_packing_type', function (e) {
            $('.btn_add_essentials_packing_type').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_essentials_packing_type').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_essentials_packing_type')}}",
                data: $('#form_essentials_packing_type').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_essentials_packing_type').trigger("reset");
                        $('#add-essentials_packing_type').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_packing_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_packing_type').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.unit_measurement) {
                            msg = data.errors.unit_measurement;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_packing_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_packing_type').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_essentials_packing_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_essentials_packing_type').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_essentials_packing_type', function (e) {
            $('.btn_edit_essentials_packing_type').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_essentials_packing_type').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_essentials_packing_type')}}",
                data: $('#form_edit_essentials_packing_type').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_essentials_packing_type').trigger("reset");
                        $('#edit-essentials_packing_type').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_packing_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_packing_type').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_unit_measurement) {
                            msg = data.errors.edit_unit_measurement;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_packing_type').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_packing_type').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_essentials_packing_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_essentials_packing_type').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_essentials_packing_type', function () {
            $('#load_modal').show();
            $('#edit-essentials_packing_type').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_essentials_packing_type')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_name').val(data.name);
                    $('#edit_code').val(data.code);
                    $('#edit_unit_measurement').val(data.unit_measurement);
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
                    $('.btn_add_essentials_packing_type').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_essentials_packing_type').html(loadingText);
                    $('#edit-essentials_packing_type').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_essentials_packing_type', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف نوع ملزومات اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_essentials_packing_type')}}",
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
        $('#basic_li_essentials_all').addClass("active");
        $('#basic_li_essentials_packing_type').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
