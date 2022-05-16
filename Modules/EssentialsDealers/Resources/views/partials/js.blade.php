<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('essentials_dealers')}}",
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

        $('body').on('click', '.add_essentials_dealers', function () {
            $('#add-essentials_dealers').modal('show');
        });

        $('body').on('click', '.btn_add_essentials_dealers', function (e) {
            $('.btn_add_essentials_dealers').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_essentials_dealers').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_essentials_dealers')}}",
                data: $('#form_add_essentials_dealers').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_essentials_dealers').trigger("reset");
                        $('#add-essentials_dealers').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_dealers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_dealers').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.essentials_packing_id) {
                            msg = data.errors.essentials_packing_id;
                        }


                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_essentials_dealers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_essentials_dealers').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_essentials_dealers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_essentials_dealers').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_essentials_dealers', function (e) {
            $('.btn_edit_essentials_dealers').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_essentials_dealers').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_essentials_dealers')}}",
                data: $('#form_edit_essentials_dealers').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_essentials_dealers').trigger("reset");
                        $('#edit-essentials_dealers').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_dealers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_dealers').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_essentials_packing_id) {
                            msg = data.errors.edit_essentials_packing_id;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_essentials_dealers').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_essentials_dealers').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_essentials_dealers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_essentials_dealers').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_essentials_dealers', function () {
            $('#edit_essentials_packing_id').empty();
            $('#load_modal').show();
            $('#edit-essentials_dealers').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_essentials_dealers')}}",
                data: {id},
                type: 'GET',
                success: function (data) {


                    for (i = 0; i < data.essentials_packings.length; i++) {
                        $('#edit_essentials_packing_id').append(
                            "<option value='" + data.essentials_packings[i].id + "'>" + data.essentials_packings[i].name + "</option>"
                        );
                    }



                    $('#edit_essentials_packing_id').val(data.data.essentials_packing_id);
                    $('#edit_code').val(data.data.code);
                    $('#edit_representative_name').val(data.data.representative_name);
                    $('#edit_company_name').val(data.data.company_name);
                    $('#edit_phone').val(data.data.phone);
                    $('#edit_description').val(data.data.description);
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
                    $('.btn_edit_essentials_dealers').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_essentials_dealers').html(loadingText);
                    $('#edit-essentials_dealers').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_essentials_dealers', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف تامیین کننده اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_essentials_dealers')}}",
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
        $('#basic_li_essentials_dealers').addClass("active");
        $('#basic_li_essentials_all').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

    });

</script>
<script>
    $('.essentials_packing_id').select2({
        dropdownParent: $('#add-essentials_dealers'),
        language: {
            noResults: function () {
                return ' ملزوماتی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_essentials_packing_id').select2({
        dropdownParent: $('#edit-essentials_dealers'),
        language: {
            noResults: function () {
                return ' ملزوماتی با این مشخصات یافت نشد!'
            }
        }
    });


</script>
