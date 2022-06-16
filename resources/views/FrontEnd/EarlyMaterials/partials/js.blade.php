<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_table() {
            $.ajax({
                url: "{{route('early_materials')}}",
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

        $('body').on('click', '.add_early_materials', function () {
            $('#add-early_materials').modal('show');
        });

        $('body').on('click', '.btn_add_early_materials', function (e) {
            $('.btn_add_early_materials').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_early_materials').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_early_materials')}}",
                data: $('#form_add_early_materials').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_early_materials').trigger("reset");
                        $('#add-early_materials').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_early_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_early_materials').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.material_id) {
                            msg = data.errors.material_id;
                        } else if (data.errors.grade_id) {
                            msg = data.errors.grade_id;
                        } else if (data.errors.petrochemical_id) {
                            msg = data.errors.petrochemical_id;
                        } else if (data.errors.quality_materials_id) {
                            msg = data.errors.quality_materials_id;
                        } else if (data.errors.current_price) {
                            msg = data.errors.current_price;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_early_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_early_materials').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_early_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_early_materials').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_early_materials', function (e) {
            $('.btn_edit_early_materials').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_early_materials').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_edit_early_materials')}}",
                data: $('#form_edit_early_materials').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_early_materials').trigger("reset");
                        $('#edit-early_materials').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_early_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_early_materials').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_material_id) {
                            msg = data.errors.edit_material_id;
                        } else if (data.errors.edit_grade_id) {
                            msg = data.errors.edit_grade_id;
                        } else if (data.errors.edit_petrochemical_id) {
                            msg = data.errors.edit_petrochemical_id;
                        } else if (data.errors.edit_quality_materials_id) {
                            msg = data.errors.edit_quality_materials_id;
                        } else if (data.errors.edit_current_price) {
                            msg = data.errors.edit_current_price;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_early_materials').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_early_materials').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_early_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_early_materials').html(loadingText);
                }
            });
        });

        $('body').on('click', '.edit_early_materials', function () {

            $('#edit_quality_materials_id').empty();
            $('#edit_petrochemical_id').empty();
            $('#edit_petrochemical_id').empty();
            $('#edit_material_id').empty();

            $('#load_modal').show();
            $('#edit-early_materials').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_early_materials')}}",
                data: {id},
                type: 'GET',
                success: function (data) {
                    for (i = 0; i < data.QualityMaterials.length; i++) {
                        $('#edit_quality_materials_id').append(
                            "<option value='" + data.QualityMaterials[i].id + "'>" + data.QualityMaterials[i].name + "</option>"
                        )
                    }

                    for (i = 0; i < data.Petrochemicals.length; i++) {
                        $('#edit_petrochemical_id').append(
                            "<option value='" + data.Petrochemicals[i].id + "'>" + data.Petrochemicals[i].name + "</option>"
                        )
                    }


                    for (i = 0; i < data.Grades.length; i++) {
                        $('#edit_grade_id').append(
                            "<option value='" + data.Grades[i].id + "'>" + data.Grades[i].code + "</option>"
                        )
                    }

                    for (i = 0; i < data.Materials.length; i++) {
                        $('#edit_material_id').append(
                            "<option value='" + data.Materials[i].id + "'>" + data.Materials[i].name + "</option>"
                        )
                    }


                    $('#edit_current_price').val(data.data.current_price);
                    $('#edit_quality_materials_id').val(data.data.quality_materials_id);
                    $('#edit_petrochemical_id').val(data.data.petrochemical_id);
                    $('#edit_grade_id').val(data.data.grade_id);
                    $('#edit_material_id').val(data.data.material_id);
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
                    $('.btn_edit_early_materials').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_edit_early_materials').html(loadingText);
                    $('#edit-users').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.ban_users', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت حساب کاربری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('ban_users')}}",
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

        $('body').on('click', '.remove_early_materials', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف مواد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_early_materials')}}",
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

        $('body').on('click', '.change_early_materials', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت مواد اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('change_early_materials')}}",
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
        $('#basic_li_early_materials').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });


    });


</script>
<script>
    $('.material_id').select2({
        dropdownParent: $('#add-early_materials'),
        language: {
            noResults: function () {
                return 'مواد با این مشخصات یافت نشد!'
            }
        }
    });

    $('.grade_id').select2({
        dropdownParent: $('#add-early_materials'),
        language: {
            noResults: function () {
                return 'گرید با این مشخصات یافت نشد!'
            }
        }
    });

    $('.petrochemical_id').select2({
        dropdownParent: $('#add-early_materials'),
        language: {
            noResults: function () {
                return 'پتروشیمی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.quality_materials_id').select2({
        dropdownParent: $('#add-early_materials'),
        language: {
            noResults: function () {
                return 'مواد اولیه با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_material_id').select2({
        dropdownParent: $('#edit-early_materials'),
        language: {
            noResults: function () {
                return 'مواد با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_grade_id').select2({
        dropdownParent: $('#edit-early_materials'),
        language: {
            noResults: function () {
                return 'گرید با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_petrochemical_id').select2({
        dropdownParent: $('#edit-early_materials'),
        language: {
            noResults: function () {
                return 'پتروشیمی با این مشخصات یافت نشد!'
            }
        }
    });

    $('.edit_quality_materials_id').select2({
        dropdownParent: $('#edit-early_materials'),
        language: {
            noResults: function () {
                return 'مواد اولیه با این مشخصات یافت نشد!'
            }
        }
    });

</script>
