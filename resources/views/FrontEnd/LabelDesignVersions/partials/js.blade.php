<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('label_design_version')}}",
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

        $('body').on('click', '.add_label_design_version', function () {
            $('#add-label_design_version').modal('show');
        });

        $('body').on('click', '.btn_add_label_design_version', function (e) {
            $('.btn_add_label_design_version').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_label_design_version').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_add_label_design_version')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_label_design_version')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_label_design_version').trigger("reset");
                        $('#add-label_design_version').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_design_version').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_design_version').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.code) {
                            msg = data.errors.code;
                        }
                        if (data.errors.name) {
                            msg = data.errors.name;
                        }
                        if (data.errors.customer_id) {
                            msg = data.errors.customer_id;
                        }
                        if (data.errors.label_type_id) {
                            msg = data.errors.label_type_id;
                        }

                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_label_design_version').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_label_design_version').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_label_design_version').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_design_version').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_label_design_version', function (e) {
            $('.btn_edit_label_design_version').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_label_design_version').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_edit_label_design_version')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_edit_label_design_version')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_label_design_version').trigger("reset");
                        $('#edit-label_design_version').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_design_version').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_design_version').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_code) {
                            msg = data.errors.edit_code;
                        }
                        if (data.errors.edit_name) {
                            msg = data.errors.edit_name;
                        }
                        if (data.errors.edit_customer_id) {
                            msg = data.errors.edit_customer_id;
                        }
                        if (data.errors.edit_label_type_id) {
                            msg = data.errors.edit_label_type_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_label_design_version').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_label_design_version').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_edit_label_design_version').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_label_design_version').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_label_design_version', function () {
            $('#load_modal').show();
            $('#edit-label_design_version').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_label_design_version')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#edit_label_design_id').empty();
                    $('#edit_designer_id').empty();

                    for (i = 0; i < data.label_designs.length; i++) {
                        $('#edit_label_design_id').append(
                            "<option value='" + data.label_designs[i].id + "'>" + data.label_designs[i].name +  "</option>"
                        );
                    }
                    for (i = 0; i < data.designers.length; i++) {
                        $('#edit_designer_id').append(
                            "<option value='" + data.designers[i].id + "'>" + data.designers[i].name + " " + data.designers[i].fname +  "</option>"
                        );
                    }


                    $('#edit_label_design_id').val(data.data.label_design_id);
                    $('#edit_designer_id').val(data.data.designer_id);
                    $('#edit_shape').val(data.data.shape);
                    $('#edit_size').val(data.data.size);
                    $('#edit_code').val(data.data.code);
                    $('#edit_direction').val(data.data.direction);
                    $('#edit_name_file').val(data.data.name_file);
                    $('#edit_text').val(data.data.text);
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
                    $('.btn_add_label_design_version').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_label_design_version').html(loadingText);
                    $('#edit-label_design_version').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.see_file', function () {
            $('#load_modall').show();
            $('#see-file_modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('see_file_label_design_version')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    $('#image_file').attr("src", '');
                    $('#image_file').attr("src", data.data.file);
                    $('#load_modall').fadeOut();
                    $('#ajaxSpinnerDemoo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('#see-file_modal').modal('hide');
                    $('#load_modall').fadeOut();

                }
            });
        });

        $('body').on('click', '.remove_label_design_version', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف ورژن لیبل اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_label_design_version')}}",
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
        $('#basic_li_label_all').addClass("active");
        $('#basic_li_label_design_version').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
    });

</script>
<script>
    $('.label_design_id').select2({
        dropdownParent: $('#add-label_design_version'),
        language: {
            noResults: function () {
                return 'طرح لیبل با این مشخصات یافت نشد!'
            }
        }
    });
    $('.designer_id').select2({
        dropdownParent: $('#add-label_design_version'),
        language: {
            noResults: function () {
                return 'طراح با این مشخصات یافت نشد!'
            }
        }
    });



    $('.edit_label_design_id').select2({
        dropdownParent: $('#edit-label_design_version'),
        language: {
            noResults: function () {
                return 'طرح لیبل با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_designer_id').select2({
        dropdownParent: $('#edit-label_design_version'),
        language: {
            noResults: function () {
                return 'طراح با این مشخصات یافت نشد!'
            }
        }
    });


</script>
